<?php
	include_once("includes/global.php");
	include_once("includes/admin_class.php");
	$admin = new admin();
	if(!empty($_GET['oper'])&&$_GET['oper']=='ajax')
	{
		switch($_GET['call'])
		{
			case 'search_cate':
				if(!empty($_POST['key_word'])){
					$wsql = NULL;
					$catlist = array();
					$key_words = explode(',',str_replace(' ','',$_POST['key_word']));

					if($key_words!=null)
					{
						foreach($key_words as $word)
						{
							if($word!=''){
								$word = addslashes( $word );
								$wsql[] =" ( cat like '%$word%' OR keyword like '%$word%' )";
							}
						}
						if($wsql!=NULL)
						{
							$wsql = implode(' or ',$wsql);
							$sql = "select catid from ".PCAT." where $wsql order by catid desc limit 0,10";
							$db->query($sql);
							
							while( $c = $db->fetchRow())
							{
								$vc = array();
								$v = $c['catid'];
								$vc[]=substr($v,0,4);
								if(strlen($v)>4)
									$vc[]=substr($v,0,6);
								if(strlen($v)>6)
									$vc[]=substr($v,0,8);
								if(strlen($v)>8)
									$vc[]=$v;
								$catlist[] = array( $v,implode(",",$vc) );
							}
						}
					}

					if($catlist!=null)
					{
						foreach($catlist as $key)
						{
							$cats[$key[0]] = $admin->getProTypeName($key[1]);
						}
					}
					echo json_encode($cats);

				}
				break;
		}
		die();
	}
?>