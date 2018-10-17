<?php
namespace app\test\controller;
use think\Controller;
use think\Db;
class Index extends Controller
{
    public function autopull()
    {
		$param=input('param.');
		$param=json_encode($param);
  		Db::name('test')->insert(['con'=>$param]);

  		// 与webhook配置相同，为了安全，请设置此参数
  		$secret = "123456789";
  		// 项目路径
  		$path = "/var/www/html/mytest/";
  		// 校验发送位置，正确的情况下自动拉取代码，实现自动部署
  		$signature = $_SERVER['HTTP_X_HUB_SIGNATURE'];
  		if ($signature) {
  			$hash = "sha1=".hash_hmac('sha1', file_get_contents("php://input"), $secret);
  			if (strcmp($signature, $hash) == 0) {
  				echo shell_exec("cd {$path} && git pull");
  				exit();
  			}
  		}
  		http_response_code(404);
  		
  		---------------------
  		作者：xfcy514728
  		来源：CSDN
  		原文：https://blog.csdn.net/xfcy514728/article/details/80293042?utm_source=copy
  		版权声明：本文为博主原创文章，转载请附上博文链接！
    }
    public function index()
    {
 	  $a='{"payload":"{\"ref\":\"refs\/heads\/master\",\"before\":\"a0a63e0004de8cd811cc1e48461cb67fcab67875\",\"after\":\"6290624e889b5e40b57f14d18a2455f6769abf70\",\"created\":false,\"deleted\":false,\"forced\":false,\"base_ref\":null,\"compare\":\"https:\/\/github.com\/qq695765749\/mytest\/compare\/a0a63e0004de...6290624e889b\",\"commits\":[{\"id\":\"6290624e889b5e40b57f14d18a2455f6769abf70\",\"tree_id\":\"9521ff51903e1ffe4c2de4c8ebcc2d8abe2b3994\",\"distinct\":true,\"message\":\"1\",\"timestamp\":\"2018-10-17T14:40:14+08:00\",\"url\":\"https:\/\/github.com\/qq695765749\/mytest\/commit\/6290624e889b5e40b57f14d18a2455f6769abf70\",\"author\":{\"name\":\"tom\",\"email\":\"tom@qq.com\",\"username\":\"tomAAAAfwesfrwefgergergertghrtyhtr\"},\"committer\":{\"name\":\"tom\",\"email\":\"tom@qq.com\",\"username\":\"tomAAAAfwesfrwefgergergertghrtyhtr\"},\"added\":[],\"removed\":[],\"modified\":[\"1.txt\"]}],\"head_commit\":{\"id\":\"6290624e889b5e40b57f14d18a2455f6769abf70\",\"tree_id\":\"9521ff51903e1ffe4c2de4c8ebcc2d8abe2b3994\",\"distinct\":true,\"message\":\"1\",\"timestamp\":\"2018-10-17T14:40:14+08:00\",\"url\":\"https:\/\/github.com\/qq695765749\/mytest\/commit\/6290624e889b5e40b57f14d18a2455f6769abf70\",\"author\":{\"name\":\"tom\",\"email\":\"tom@qq.com\",\"username\":\"tomAAAAfwesfrwefgergergertghrtyhtr\"},\"committer\":{\"name\":\"tom\",\"email\":\"tom@qq.com\",\"username\":\"tomAAAAfwesfrwefgergergertghrtyhtr\"},\"added\":[],\"removed\":[],\"modified\":[\"1.txt\"]},\"repository\":{\"id\":153237989,\"node_id\":\"MDEwOlJlcG9zaXRvcnkxNTMyMzc5ODk=\",\"name\":\"mytest\",\"full_name\":\"qq695765749\/mytest\",\"private\":false,\"owner\":{\"name\":\"qq695765749\",\"email\":\"36432409+qq695765749@users.noreply.github.com\",\"login\":\"qq695765749\",\"id\":36432409,\"node_id\":\"MDQ6VXNlcjM2NDMyNDA5\",\"avatar_url\":\"https:\/\/avatars3.githubusercontent.com\/u\/36432409?v=4\",\"gravatar_id\":\"\",\"url\":\"https:\/\/api.github.com\/users\/qq695765749\",\"html_url\":\"https:\/\/github.com\/qq695765749\",\"followers_url\":\"https:\/\/api.github.com\/users\/qq695765749\/followers\",\"following_url\":\"https:\/\/api.github.com\/users\/qq695765749\/following{\/other_user}\",\"gists_url\":\"https:\/\/api.github.com\/users\/qq695765749\/gists{\/gist_id}\",\"starred_url\":\"https:\/\/api.github.com\/users\/qq695765749\/starred{\/owner}{\/repo}\",\"subscriptions_url\":\"https:\/\/api.github.com\/users\/qq695765749\/subscriptions\",\"organizations_url\":\"https:\/\/api.github.com\/users\/qq695765749\/orgs\",\"repos_url\":\"https:\/\/api.github.com\/users\/qq695765749\/repos\",\"events_url\":\"https:\/\/api.github.com\/users\/qq695765749\/events{\/privacy}\",\"received_events_url\":\"https:\/\/api.github.com\/users\/qq695765749\/received_events\",\"type\":\"User\",\"site_admin\":false},\"html_url\":\"https:\/\/github.com\/qq695765749\/mytest\",\"description\":null,\"fork\":false,\"url\":\"https:\/\/github.com\/qq695765749\/mytest\",\"forks_url\":\"https:\/\/api.github.com\/repos\/qq695765749\/mytest\/forks\",\"keys_url\":\"https:\/\/api.github.com\/repos\/qq695765749\/mytest\/keys{\/key_id}\",\"collaborators_url\":\"https:\/\/api.github.com\/repos\/qq695765749\/mytest\/collaborators{\/collaborator}\",\"teams_url\":\"https:\/\/api.github.com\/repos\/qq695765749\/mytest\/teams\",\"hooks_url\":\"https:\/\/api.github.com\/repos\/qq695765749\/mytest\/hooks\",\"issue_events_url\":\"https:\/\/api.github.com\/repos\/qq695765749\/mytest\/issues\/events{\/number}\",\"events_url\":\"https:\/\/api.github.com\/repos\/qq695765749\/mytest\/events\",\"assignees_url\":\"https:\/\/api.github.com\/repos\/qq695765749\/mytest\/assignees{\/user}\",\"branches_url\":\"https:\/\/api.github.com\/repos\/qq695765749\/mytest\/branches{\/branch}\",\"tags_url\":\"https:\/\/api.github.com\/repos\/qq695765749\/mytest\/tags\",\"blobs_url\":\"https:\/\/api.github.com\/repos\/qq695765749\/mytest\/git\/blobs{\/sha}\",\"git_tags_url\":\"https:\/\/api.github.com\/repos\/qq695765749\/mytest\/git\/tags{\/sha}\",\"git_refs_url\":\"https:\/\/api.github.com\/repos\/qq695765749\/mytest\/git\/refs{\/sha}\",\"trees_url\":\"https:\/\/api.github.com\/repos\/qq695765749\/mytest\/git\/trees{\/sha}\",\"statuses_url\":\"https:\/\/api.github.com\/repos\/qq695765749\/mytest\/statuses\/{sha}\",\"languages_url\":\"https:\/\/api.github.com\/repos\/qq695765749\/mytest\/languages\",\"stargazers_url\":\"https:\/\/api.github.com\/repos\/qq695765749\/mytest\/stargazers\",\"contributors_url\":\"https:\/\/api.github.com\/repos\/qq695765749\/mytest\/contributors\",\"subscribers_url\":\"https:\/\/api.github.com\/repos\/qq695765749\/mytest\/subscribers\",\"subscription_url\":\"https:\/\/api.github.com\/repos\/qq695765749\/mytest\/subscription\",\"commits_url\":\"https:\/\/api.github.com\/repos\/qq695765749\/mytest\/commits{\/sha}\",\"git_commits_url\":\"https:\/\/api.github.com\/repos\/qq695765749\/mytest\/git\/commits{\/sha}\",\"comments_url\":\"https:\/\/api.github.com\/repos\/qq695765749\/mytest\/comments{\/number}\",\"issue_comment_url\":\"https:\/\/api.github.com\/repos\/qq695765749\/mytest\/issues\/comments{\/number}\",\"contents_url\":\"https:\/\/api.github.com\/repos\/qq695765749\/mytest\/contents\/{+path}\",\"compare_url\":\"https:\/\/api.github.com\/repos\/qq695765749\/mytest\/compare\/{base}...{head}\",\"merges_url\":\"https:\/\/api.github.com\/repos\/qq695765749\/mytest\/merges\",\"archive_url\":\"https:\/\/api.github.com\/repos\/qq695765749\/mytest\/{archive_format}{\/ref}\",\"downloads_url\":\"https:\/\/api.github.com\/repos\/qq695765749\/mytest\/downloads\",\"issues_url\":\"https:\/\/api.github.com\/repos\/qq695765749\/mytest\/issues{\/number}\",\"pulls_url\":\"https:\/\/api.github.com\/repos\/qq695765749\/mytest\/pulls{\/number}\",\"milestones_url\":\"https:\/\/api.github.com\/repos\/qq695765749\/mytest\/milestones{\/number}\",\"notifications_url\":\"https:\/\/api.github.com\/repos\/qq695765749\/mytest\/notifications{?since,all,participating}\",\"labels_url\":\"https:\/\/api.github.com\/repos\/qq695765749\/mytest\/labels{\/name}\",\"releases_url\":\"https:\/\/api.github.com\/repos\/qq695765749\/mytest\/releases{\/id}\",\"deployments_url\":\"https:\/\/api.github.com\/repos\/qq695765749\/mytest\/deployments\",\"created_at\":1539673362,\"updated_at\":\"2018-10-17T06:36:22Z\",\"pushed_at\":1539758363,\"git_url\":\"git:\/\/github.com\/qq695765749\/mytest.git\",\"ssh_url\":\"git@github.com:qq695765749\/mytest.git\",\"clone_url\":\"https:\/\/github.com\/qq695765749\/mytest.git\",\"svn_url\":\"https:\/\/github.com\/qq695765749\/mytest\",\"homepage\":null,\"size\":385,\"stargazers_count\":0,\"watchers_count\":0,\"language\":\"PHP\",\"has_issues\":true,\"has_projects\":true,\"has_downloads\":true,\"has_wiki\":true,\"has_pages\":false,\"forks_count\":0,\"mirror_url\":null,\"archived\":false,\"open_issues_count\":0,\"license\":{\"key\":\"other\",\"name\":\"Other\",\"spdx_id\":\"NOASSERTION\",\"url\":null,\"node_id\":\"MDc6TGljZW5zZTA=\"},\"forks\":0,\"open_issues\":0,\"watchers\":0,\"default_branch\":\"master\",\"stargazers\":0,\"master_branch\":\"master\"},\"pusher\":{\"name\":\"qq695765749\",\"email\":\"36432409+qq695765749@users.noreply.github.com\"},\"sender\":{\"login\":\"qq695765749\",\"id\":36432409,\"node_id\":\"MDQ6VXNlcjM2NDMyNDA5\",\"avatar_url\":\"https:\/\/avatars3.githubusercontent.com\/u\/36432409?v=4\",\"gravatar_id\":\"\",\"url\":\"https:\/\/api.github.com\/users\/qq695765749\",\"html_url\":\"https:\/\/github.com\/qq695765749\",\"followers_url\":\"https:\/\/api.github.com\/users\/qq695765749\/followers\",\"following_url\":\"https:\/\/api.github.com\/users\/qq695765749\/following{\/other_user}\",\"gists_url\":\"https:\/\/api.github.com\/users\/qq695765749\/gists{\/gist_id}\",\"starred_url\":\"https:\/\/api.github.com\/users\/qq695765749\/starred{\/owner}{\/repo}\",\"subscriptions_url\":\"https:\/\/api.github.com\/users\/qq695765749\/subscriptions\",\"organizations_url\":\"https:\/\/api.github.com\/users\/qq695765749\/orgs\",\"repos_url\":\"https:\/\/api.github.com\/users\/qq695765749\/repos\",\"events_url\":\"https:\/\/api.github.com\/users\/qq695765749\/events{\/privacy}\",\"received_events_url\":\"https:\/\/api.github.com\/users\/qq695765749\/received_events\",\"type\":\"User\",\"site_admin\":false}}"}';
  		$a=json_decode($a,1);
  		dump(json_decode($a['payload'],1));
    }
    
    public function index2()
    {
		// 与webhook配置相同，为了安全，请设置此参数
		$secret = "wmhello";
		// 项目路径
		$path = "d:/www/apidemo";
		// 校验发送位置，正确的情况下自动拉取代码，实现自动部署
		$signature = $_SERVER['HTTP_X_HUB_SIGNATURE'];
		if ($signature) {
			$hash = "sha1=".hash_hmac('sha1', file_get_contents("php://input"), $secret);
			if (strcmp($signature, $hash) == 0) {
				echo shell_exec("cd \ && cd {$path} && git pull 2>&1");
				exit();
			}
		}
    }
    
    
}

