/*
+-----------------------------------------------------------------------
|	文件概要：表单检查文件
|	文件名称：check.js
|	创建时间：2010-5-20
+-----------------------------------------------------------------------
|	版权所有 2010-2011 Junkball，并保留所有权利。
|	网址：http://www.Kok100.com/	或者http://www.Junkball.cn/
+-----------------------------------------------------------------------
|	这是一个免费并且开源的程序，您可以免费无限制的使用。
|	但你以任何形式任何目地再发布或更改代码后，作者概不负责。
+-----------------------------------------------------------------------
*/
function Check_add(theForm)
{
  if (theForm.user.value == "")
  {
    alert("请填写昵称！");
    theForm.user.focus();
    return (false);
  }
  if (theForm.user.value.length<3)
  {
    alert("昵称至少为3个字符！");
    theForm.user.focus();
    return (false);
  }
  if(theForm.qq.value!=""){
	  if (theForm.qq.value.length!=11)
  {
    alert("手机号码为11位数字，请正确填写你的手机号码！");
    theForm.qq.focus();
    return (false);
  }
  if (theForm.qq.value.length>11)
  {
    alert("手机号码最多为11个数字！");
    theForm.qq.focus();
    return (false);
  }
  	var qq1 = theForm.qq.value;
	  var pattern = /^\d+?$/;
	  flag = pattern.test(qq1);
	  if(!flag){
		  alert("手机号码填写错误！");
		  theForm.qq.focus();
		  return false;
		  }
	  }
  if(theForm.email.value!=""){
              var email1 = theForm.email.value;
              var pattern = /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(\.[a-zA-Z0-9_-])+/; 
              flag = pattern.test(email1); 
              if(!flag){
              alert("邮件地址格式不对！");
     theForm.email.focus();
           return false;}
  }

  if (theForm.text.value == "")
  {
    alert("留言内容不能空！");
    theForm.text.focus();
    return (false);
  }
  if (theForm.text.value.length<5)
  {
    alert("留言内容最少5个字符！");
    theForm.text.focus();
    return (false);
  }
  if (theForm.unum.value == "")
  {
    alert("请输入验证码！");
    theForm.unum.focus();
    return (false);
  }
   return (true);
}
function Check_login(theForm){
	if (theForm.user.value == "")
  {
    alert("请填写用户名！");
    theForm.user.focus();
    return (false);
  }
  if (theForm.pwd.value == "")
  {
    alert("请填写填写密码！");
    theForm.pwd.focus();
    return (false);
  }
	}
function Check_reply(theForm){
	if(theForm.treply.value=="")
	{
		alert("请填写回复内容！");
		theForm.treply.focus();
		return (false);
		}
	}
function Check_pwd(theForm){
	if(theForm.laopwd.value=="")
	{
		alert("请填写原始密码！");
		theForm.laopwd.focus();
		return (false);
		}
	if(theForm.newpwd.value=="")
	{
		alert("请填写新的密码！");
		theForm.newpwd.focus();
		return (false);
		}
	if(theForm.newpwd.value!==theForm.newpwdtoo.value)
	{
		alert("新密码两次输入不一致！");
		theForm.newpwdtoo.focus();
		return (false);
		}
	}