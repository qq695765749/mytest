<?php
namespace app\test\controller;
use think\Controller;
use think\Db;
class Index extends Controller
{
    public function autopull()
    {
// ���زֿ�·��
$local = '/var/www/html/mytest';

// ��ȫ��֤�ַ�����Ϊ������֤
$token = '';


// ���������֤��������֤ʧ�ܣ����ش���
$httpToken = isset($_SERVER['HTTP_X_GITLAB_TOKEN']) ? $_SERVER['HTTP_X_GITLAB_TOKEN'] : '';
if ($token && $httpToken != $token) {
    header('HTTP/1.1 403 Permission Denied');
    die('Permission denied.');
}

// ����ֿ�Ŀ¼�����ڣ����ش���
if (!is_dir($local)) {
    header('HTTP/1.1 500 Internal Server Error');
    die('Local directory is missing');
}

//�������������Ϊ�գ����ش���
$payload = file_get_contents('php://input');
if (!$payload) {
    header('HTTP/1.1 400 Bad Request');
    die('HTTP HEADER or POST is missing.');
}

/*
 * �����м�����Ҫע�⣺
 *
 * 1.ȷ��PHP����ִ��ϵͳ���дһ��PHP�ļ������ݣ�
 * `<?php shell_exec('ls -la')`
 * ��ͨ���������������ļ����ܹ����Ŀ¼�ṹ˵��PHP��������ϵͳ���
 *
 * 2��PHPһ��ʹ��www-data����nginx�û����У�PHPͨ���ű�ִ��ϵͳ����Ҳ��������û���
 * ���Ա���ȷ���ڸ��û���Ŀ¼��һ����/home/www-data��/home/nginx������.sshĿ¼��
 * һЩ��Ȩ�ļ����Լ�git�����ļ������£�
 * ```
 * + .ssh
 *   - authorized_keys
 *   - config
 *   - id_rsa
 *   - id_rsa.pub
 *   - known_hosts
 * - .gitconfig
 * ```
 *
 * 3.��ִ�е�����������2>&1���������ϸ��Ϣ��ȷ������λ��
 *
 * 4.gitĿ¼Ȩ�����⡣���磺
 * `fatal: Unable to create '/data/www/html/awaimai/.git/index.lock': Permission denied`
 * �Ǿ���PHP�û�û��дȨ�ޣ���Ҫ��Ŀ¼����Ȩ��:
 * ``
 * sudo chown -R :www-data /data/www/html/awaimai`
 * sudo chmod -R g+w /data/www/html/awaimai
 * ```
 *
 * 5.SSH��֤���⡣�����ͨ��SSH��֤���п�����ʾ����
 * `Could not create directory '/.ssh'.`
 * ����
 * `Host key verification failed.`
 *
 */
echo shell_exec("cd {$local} && git pull 2>&1");
die("done " . date('Y-m-d H:i:s', time()));
    }
   
    
}

