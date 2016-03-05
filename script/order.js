// JavaScript Document

/**
 * 判断是否是空
 * @param value
 */
function isEmpty(value){
	if(value == null || value == "" || value == "undefined" || value == undefined || value == "null"){
		return true;
	}
	else{
		value = value.replace(/\s/g,"");
		if(value == ""){
			return true;
		}
		return false;
	}
}

/**
 * 判断是否是数字
 */
function isNumber(value){
	if(isNaN(value)){
		return false;
	}
	else{
		return true;
	}
}

/**
 * 只包含中文和英文
 * @param cs
 * @returns {Boolean}
 */
function isGbOrEn(value){
    var regu = "^[a-zA-Z\u4e00-\u9fa5]+$";
    var re = new RegExp(regu);
    if (value.search(re) != -1){
      return true;
    } else {
      return false;
    }
}

/**
 * 检查邮箱格式
 * @param email
 * @returns {Boolean}
 */
function check_email(email){  
   if(email){
   var myReg=/(^\s*)\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*(\s*$)/;
   if(!myReg.test(email)){return false;}
   return true;
   }
   return false;
}

/**
 * 检查手机号码
 * @param mobile
 * @returns {Boolean}
 */
function check_mobile(mobile){
  var regu = /^\d{11}$/;
  var re = new RegExp(regu);
  if(!re.test(mobile)){
	 return  false;
  }
  return true;
}

//正则
function trimTxt(txt){
 return txt.replace(/(^\s*)|(\s*$)/g, "");
}
/**
 * 检查是否含有非法字符
 * @param temp_str
 * @returns {Boolean}
 */
function is_forbid(temp_str){
    temp_str=trimTxt(temp_str);
	temp_str = temp_str.replace('*',"@");
	temp_str = temp_str.replace('--',"@");
	temp_str = temp_str.replace('/',"@");
	temp_str = temp_str.replace('+',"@");
	temp_str = temp_str.replace('\'',"@");
	temp_str = temp_str.replace('\\',"@");
	temp_str = temp_str.replace('$',"@");
	temp_str = temp_str.replace('^',"@");
	temp_str = temp_str.replace('.',"@");
	temp_str = temp_str.replace(';',"@");
	temp_str = temp_str.replace('<',"@");
	temp_str = temp_str.replace('>',"@");
	temp_str = temp_str.replace('"',"@");
	temp_str = temp_str.replace('=',"@");
	temp_str = temp_str.replace('{',"@");
	temp_str = temp_str.replace('}',"@");
	var forbid_str=new String('@,%,~,&');
	var forbid_array=new Array();
	forbid_array=forbid_str.split(',');
	for(i=0;i<forbid_array.length;i++){
		if(temp_str.search(new RegExp(forbid_array[i])) != -1)
		return false;
	}
	return true;
}

/**
 * 打开蒙版
 * 
 * @param id
 */
function openExpose(id) {
	$.jExpose($(id), {
		exposeClass: "step-current",
		onLoad: function(){
			$("order_buttons").jSticky("destory");
		},
		onClose: function(){
			$("#order_buttons").jSticky("refresh");
		}
	});
}

/**
 * 关闭蒙版
 * 
 * @param id
 */
function closeExpose(id) {
	$.jExpose.close();
}

/**
 * 设置高亮选中
 * 
 * @param step
 */
function step_Openlight(step) {
	if (step == 'consignee') {
		$("#step-1").addClass("step-current");
		openExpose("#step-1");
	} else if (step == 'payment') {
		$("#step-2").addClass("step-current");
		openExpose("#step-2");
	} else if (step == 'invoice') {
		$("#step-3").addClass("step-current");
		openExpose("#step-3");
	}
}

/**
 * 关闭高亮选中
 * 
 * @param step
 */
function set_CloseLight(step) {
	if (step == 'consignee') {
		$("#step-1").removeClass("step-current");
		closeExpose("#step-1");
	} else if (step == 'payment') {
		$("#step-2").removeClass("step-current");
		closeExpose("#step-2");
	} else if (step == 'invoice') {
		$("#step-3").removeClass("step-current");
		closeExpose("#step-3");
	}
}

function open_Module(name) {

	$("#"+name+"_edit_action a").hide();
	step_Openlight(name);
	
	var url = "?m=product&s=shop_order";
	if(name=='payment')
	{
		city=$("#city").val();
		weight=$("#weight").val();
		sumprice=$("#sumprice").val();
		var pars = 'act='+name+'&city='+city+'&weight='+weight+'&sumprice='+sumprice;
	}
	else
	var pars = 'act='+name;
	
	$.post(url, pars,showResponse);
	function showResponse(originalRequest)
	{		
		if(originalRequest)
		{
			$("#"+name).html(originalRequest);
		}
	}
}
/**
 * 选择
 * 
 * @param id
 */
function chose_consignee(id) {
	$("#consignee_form").hide();
	$("#use_new_address").removeClass("item-selected");
	$("#consignee_radio_" + id).attr("checked", "checked");
	var parentDiv = $("#consignee_radio_" + id).parent();
	parentDiv.addClass("item-selected").siblings().removeClass("item-selected");
	$("#hidden_consignee_id").val(id);
}
function chose_invoice(id) {
	$("#invoice_form").hide();
	$("#use_new_invoice").removeClass("item-selected");
	$("#invoice_radio_" + id).attr("checked", "checked");
	var parentDiv = $("#invoice_radio_" + id).parent();
	parentDiv.addClass("item-selected").siblings().removeClass("item-selected");
	$("#hidden_invoice_id").val(id);
}
function chose_payment(id) {
	$("#payment_radio_" + id).attr("checked", "checked");
	var parentDiv = $("#payment_radio_" + id).parent().parent();
	parentDiv.addClass("item-selected").siblings().removeClass("item-selected");
	$("#hidden_payment_id").val(id);
}
function chose_ship(id,type) {
	$("#ship_radio_" + id).attr("checked", "checked");
	var parentDiv = $("#ship_radio_" + id).parent().parent();
	parentDiv.addClass("item-selected").siblings().removeClass("item-selected");
	if(type==1)
	{
		$(".offline input").attr("checked", "checked");
		$("#hidden_payment_id").val($(".offline input").val());
		$('.online').addClass("hidden").siblings(".offline").removeClass("hidden");
	}
	else
	{
		$(".online input").eq(0).attr("checked", "checked");
		$("#hidden_payment_id").val($(".online input").eq(0).val());
		$('.online').removeClass("hidden").siblings(".offline").addClass("hidden");		
	}
	$("#hidden_ship_id").val(id);
}
/**
 * 使用新收获人地址
 */
function NewConsignee() {
	$("#consignee_form").show();
	
	$("#name").val("");
	$("#id_1").val("");
	$("#id_2").val("");
	$("#id_3").val("");
	$("#t").val("");
	$("#select_1").val("");
	$("#select_2").val("");
	$("#select_3").val("");
	$("#address").val("");
	$("#tel").val("");
	$("#mobile").val("");
	$("#email").val("");
	
	removeConsingeeMessage();
	
	$("#consignee_radio_new").attr("checked", "checked");
	$("#use_new_address").attr("class", "item item-selected");
	var consigneeList = $(".consignee_list");
	consigneeList.find(".item").each(function() {
		$(this).attr("class", "item");
	});
}

/**
 * 使用新发票
 */
function NewInvoice() {
	$("#invoice_form").show();
	
	$("#invoice_type_1").attr("checked", "checked");
	$("#invoice_rise_1").attr("checked", "checked");
	$("#invoice_content_1").attr("checked", "checked");
	
	$("#company").val('');
	$("#company1").val('');
	$("#number").val('');
	$("#address").val('');
	$("#telephone").val('');
	$("#bank").val('');
	$("#account").val('');
	
	changeInvoiceType('1');
	showCompanyDiv('1');
	$("#invoice_radio_new").attr("checked", "checked");
	$("#use_new_invoice").attr("class", "item item-selected");
	var consigneeList = $(".invoice_list");
	consigneeList.find(".item").each(function() {
		$(this).attr("class", "item");
	});
}

/**
 * 删除收货人验证提示信息
 */
function removeConsingeeMessage() {
	$("#name_error").html("");
	$("#area_error").html("");
	$("#address_error").html("");
	$("#call_error").html("");
	$("#email_error").html("");
}

/**
 * 验证收货地址消息提示
 * 
 * @param divId
 * @param value
 */
function check_Consignee(divId) {
	var errorFlag = false;
	var errorMessage = null;
	var value = null;
	
	// 验证收货人名称
	if (divId == "name") {
		value = $("#name").val();
		if (isEmpty(value)) {
			errorFlag = true;
			errorMessage = "请您填写收货人姓名";
		}
		if (value.length > 25) {
			errorFlag = true;
			errorMessage = "收货人姓名不能大于25位";
		}
		if (!is_forbid(value)) {
			errorFlag = true;
			errorMessage = "收货人姓名中含有非法字符";
		}
	}
	// 验证邮箱格式
	else if (divId == "email") {
		value = $("#email").val();
		if (!isEmpty(value)) {
			if (!check_email(value)) {
				errorFlag = true;
				errorMessage = "邮箱格式不正确";
			}
		} else {
			if (value.length > 50) {
				errorFlag = true;
				errorMessage = "邮箱长度不能大于50位";
			}
		}
	}
	// 验证地区是否完整
	else if (divId == "area") {
		var provinceId = $("#select_1").find("option:selected").val();
		var cityId = $("#select_2").find("option:selected").val();
		var townId = $("#select_3").find("option:selected").val();

		// 验证地区是否正确
		if (isEmpty(provinceId) || isEmpty(cityId) || isEmpty(townId))
		{
			errorFlag = true;
			errorMessage = "请您填写完整的地区信息";
		}
	}
	// 验证收货人地址
	else if (divId == "address") {
		value = $("#address").val();
		if (isEmpty(value)) {
			errorFlag = true;
			errorMessage = "请您填写收货人详细地址";
		}
		if (!is_forbid(value)) {
			errorFlag = true;
			errorMessage = "收货人详细地址中含有非法字符";
		}
		if (value.length>50) {
			errorFlag = true;
			errorMessage = "收货人详细地址过长";
		}
	}
	// 验证手机号码
	else if (divId == "mobile") {
		value = $("#mobile").val();
		divId = "call";
		if (isEmpty(value)) {
			errorFlag = true;
			errorMessage = "请您填写收货人手机号码";
		} else {
			if (!check_mobile(value)) {
				errorFlag = true;
				errorMessage = "手机号码格式不正确";
			}
		}
		if (!errorFlag) {
			value = $("#tel").val();
			if (!isEmpty(value)) {
				if (!isNumber(value) || value.length > 20) {
					errorFlag = true;
					errorMessage = "固定电话号码格式不正确";
				}
			}
		}
	}
	// 验证电话号码
	else if (divId == "tel") {
		value = $("#tel").val();
		divId = "call";
		if (!isEmpty(value)) {
			if (!isNumber(value) || value.length > 20) {
				errorFlag = true;
				errorMessage = "固定电话号码格式不正确";
			}
		}
		if (true) {
			value = $("#mobile").val();
			if (isEmpty(value)) {
				errorFlag = true;
				errorMessage = "请您填写收货人手机号码";
			} else {
				if (!check_mobile(value)) {
					errorFlag = true;
					errorMessage = "手机号码格式不正确";
				}
			}
		}
	}
	if (errorFlag) {
		$("#" + divId + "_error").html(errorMessage);
		return false;
	} else {
		$("#" + divId + "_error").html("");
	}
	return true;
}

/**
 * 保存收货地址（包含保存常用人收货地址，根据id区分）
 */
function save_consignee() {

	var isHidden = $("#consignee_form").is(":hidden");// 是否隐藏
	var id = $("input[name='consignee_radio']:checked").val();// 获取收货人id
	
	if(id==undefined){
		alert("请选择收货人地址!");
		return;
	}
	if (!isHidden) {
		var checkConsignee = true;

		// 验证收货人信息是否正确
		if (!check_Consignee("name")) {
			checkConsignee = false;
		}
		// 验证地区是否正确
		if (!check_Consignee("area")) {
			checkConsignee = false;
		}
		// 验证收货人地址是否正确
		if (!check_Consignee("address")) {
			checkConsignee = false;
		}
		// 验证手机号码是否正确
		if (!check_Consignee("mobile")) {
			checkConsignee = false;
		}
		// 验证电话是否正确
		if (!check_Consignee("tel")) {
			checkConsignee = false;
		}
		// 验证邮箱是否正确
		if (!check_Consignee("email")) {
			checkConsignee = false;
		}
		if (!checkConsignee) {
			return;
		}
		name=$("#name").val();
		mobile=$("#mobile").val();
		tel=$("#tel").val();
		t=$("#t").val();
		province=$("#id_1").val();
		city=$("#id_2").val();
		area=$("#id_3").val();
		address=$("#address").val();
		email=$("#email").val();
	}	
	var url = "?m=product&s=shop_order";
	if (!isHidden) {
		var pars = 'name='+name+'&mobile='+mobile+'&tel='+tel+'&t='+t+'&address='+address+'&province='+province+'&city='+city+'&area='+area+'&email='+email+'&act=add_consignee';
	}
	else{
		var pars = 'id='+id+'&act=select_consignee';
	}
	$.post(url, pars,showResponse);
	function showResponse(originalRequest)
	{
		if(originalRequest)
		{
			if (!isHidden) {
				$("#hidden_consignee_id").html(originalRequest);
			}
			else
			{	
				var tempStr = 'var MyMe = ' + originalRequest;
				eval(tempStr);
				id=MyMe['id'];
				name=MyMe['name'];
				mobile=MyMe['mobile'];
				tel=MyMe['tel'];
				t=MyMe['t'];
				city=MyMe['cityid'];
				address=MyMe['address'];
				$("#hidden_consignee_id").html(id);
				
			}
			$("#consignee_edit_action a").show();
			str="<p>"+name+"&nbsp;&nbsp;"+mobile+"&nbsp;&nbsp;"+tel+"</p><p>"+t+"&nbsp;"+address+"</p>";
			$("#consignee").html(str);
			$("#city").val(city);
			set_CloseLight("consignee");
			//open_Module('payment');
		}
	}
}
function save_payment()
{
	var id = $("input[name='payment_radio']:checked").val();// 获取id
	var id1 = $("input[name='ship_radio']:checked").val();// 获取id
	var value = $("input[name='payment_radio']:checked").next("em").html();
	var value1 = $("input[name='ship_radio']:checked").next("em").html();
	var price1 = $("#price1").html();
	var price2 = $("input[name='ship_radio']:checked").nextAll("b").html();
	if(price2=="免运费") {price2="0.00"} else{price2=price2.replace("￥",'')};
	var	price3= Number(Number(price1.replace(",",''))+Number(price2.replace(",",''))).toFixed(2);
	//if(id==undefined){
	//	alert("请选择支付方式！");
	//	return;
	//}
	if(id1==undefined){
		alert("请选择配送方式！");
		return;
	}
	$("#payment_edit_action a").show();
	$("#price3").html(price3);
	$("#price2").html(price2);
	$("#payment").html("<p>"+value1+"</p><p>"+value+"<p>");
	set_CloseLight("payment");
	//open_Module('invoice');
}
function save_invoice()
{
	var isHidden = $("#invoice_form").is(":hidden");// 是否隐藏
	var id = $("input[name='invoice_radio']:checked").val();// 获取id
	// 发票类型和内容
	
	var invoice_companyName = $("#company").val();
	var company1 = $("#company1").val();
	var number = $("#number").val();
	var address = $("#address").val();
	var telephone = $("#telephone").val();
	var bank = $("#bank").val();
	var account = $("#account").val();
			
	var invoice_type = $('input:radio[name="type"]:checked').val();
	var invoice_title = $('input:radio[name="rise"]:checked').val();
	var invoice_content = $('input:radio[name="content"]:checked').val();
	
	var invoice_type_name =$('input:radio[name="type"]:checked').next().html();
	var invoice_title_name =$('input:radio[name="rise"]:checked').next().html();
	var invoice_content_name =$('input:radio[name="content"]:checked').next().html();
	
	// 发票类型验证
	if(id==undefined){
		alert("请选择发票类型！");
		return;
	}
	if(!isHidden)
	{
		// 普通发票验证
		if (invoice_type == 0) {
			// 发票抬头验证
			if (isEmpty(invoice_title)) {
				alert("请选择发票抬头！");
				return;
			}
			else {
				// 抬头如果是单位验证
				if (invoice_title == 2) {
					if (isEmpty(invoice_companyName)) {
						alert("请输入单位名称！");
						return;
					}
					if (!is_forbid(invoice_companyName)) {
						alert("单位名称含有非法字符！");
						return;
					}
					
				}
			}
		}else if (invoice_type == 1) { // 增值税发票验证
		
		}
		
	}
	
	var url = "?m=product&s=shop_order";

	if (!isHidden) {
		var pars = 'type='+invoice_type+'&rise='+invoice_title+'&company='+invoice_companyName+'&content='+invoice_content+'&address='+address+'&company1='+company1+'&number='+number+'&telephone='+telephone+'&bank='+bank+'&account='+account+'&act=add_invoice';
	}
	else{
		var pars = 'id='+id+'&act=select_invoice';
	}
	$.post(url, pars,showResponse);
	function showResponse(originalRequest)
	{
		if(originalRequest)
		{
			if (!isHidden)
			{
				$("#hidden_invoice_id").html(originalRequest);
				if(invoice_type == 0)
				{
					str="<p>"+invoice_type_name+"&nbsp;&nbsp;"+invoice_title_name+"&nbsp;&nbsp;"+invoice_content_name+"</p>";	
				}
				else
				{
					str="<p>"+invoice_type_name+"&nbsp;&nbsp;"+invoice_content_name+"</p>";
				}
			}
			else
			{	
			
				var tempStr = 'var MyMe = ' + originalRequest;
				eval(tempStr);
				
				id=MyMe['id'];
				invoice_type=MyMe['type'];
				invoice_type_name=MyMe['itype'];
				invoice_title_name=MyMe['irise'];
				invoice_content_name=MyMe['icontent'];
				
				if(invoice_type == 0)
				{
					str="<p>"+invoice_type_name+"&nbsp;&nbsp;"+invoice_title_name+"&nbsp;&nbsp;"+invoice_content_name+"</p>";	
				}
				else
				{
					str="<p>"+invoice_type_name+"&nbsp;&nbsp;"+invoice_content_name+"</p>";
				}
				
				$("#hidden_invoice_id").html(id);
				
			}
			$("#invoice_edit_action a").show();
			
			$("#invoice").html(str);
			set_CloseLight("invoice");
			
		}
	}
}

function changeInvoiceType(type) {
	if (type == 1) {
		$("#normal_tbody").css("display", "");
		$("#special_tbody").css("display", "none");
	} else {
		$("#normal_tbody").css("display", "none");
		$("#special_tbody").css("display", "");
	}
}

/**
 * 如果选择单位，显示单位输入文本框
 */
function showCompanyDiv(type) {
	if (type == 2) {
		$("invoice_rise_2").attr("checked", "checked");
		$("#company").show();
	} else {
		$("#invoice_rise_2").attr("checked", "");
		$("#company").hide();
	}
}