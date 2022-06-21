<script type="text/javascript">

/* == VALIDATION VARIABLE================================================================================================= */
	var G_S_MAX_25 						=  	25;
	var G_S_MAX_30						=   30;
	var G_S_MAX_10						=   10;
	var G_HISTORY_COUNT					=	0;
	const G_S_VAL_MAX_EMPCODE_CHAR 		= 	6;
	const G_S_VAL_MAX_PASSWORD_CHAR 	= 	4;
	const G_S_VAL_MAX_NAME_CHAR 		= 	18;
	const G_S_VAL_MAX_FULLNAME_CHAR 	= 	50;
/* == DISPLAY INFORMATION VARIABLE ====================================================================================== */
	var G_S_PROD_ID_NEW 			=  	"＊ 新品番登録";
	var G_BOOL_IS_INSERT			=	true; // IF FALSE WHEN SAVE BUTTON IS CLICKED IT WILL DO UPDATE QUERY, OTHERWISE WILL DO INSERT QUERY
	var G_BOOL_IS_HISTORY			=	false;
	var G_PHP_DATE_NOW 				=  	"<?= date('Y-m-d') ?>"; // DISADVANTAGE: Date wont change if u keep open the browser more than 2 days, (use ajax)
	var G_PHP_DATETIME_NOW 				=  	"<?= date('Y-m-d H:i:s.v') ?>";
	var G_S_REQUIRED_ITEM 			=  	"＊ 必須項目";
	var G_S_NO_KANJI				=	"＊ 許可されていない文字がある"
	var G_S_APP_NAME               	=  	"<?= $app_name ?>";
	var G_S_TOAST_DELETED 			=  	"削除しました";
	var G_S_TOAST_SAVED 			=   "保存しました";
	var G_S_SAVE_FAILED 			= 	"保存に失敗しました";

	var G_S_MODE_UPDATE				=	"＊更新モード";
	var G_S_MODE_INSERT				=	"＊登録モード";
	var G_S_MODE_HISTORY			=	"＊履歴モード";

	var G_S_SAVE_BTN_UPDATE			=	"更新";
	var G_S_SAVE_BTN_INSERT			=	"登録";
	var G_S_SAVE_BTN_HISTORY		=	"ー";

	var G_S_TOAST_UPDATED 			=   "更新しました";
	var G_S_TOAST_INSERTED 			=   "登録しました";
	var G_CHG_LIST_DELETE 			=   false;
	var G_CHG_LIST_DISPLAY 			=   false;
	var G_MODE						=	"";
	var G_CHECKED_PRODUCT 			=   false;
	var G_CHECKED_MAT 				=   false;

	let G_S_REGEX_NUMERIC_GLOBAL 		= /[^0-9]/g;
	let G_S_REGEX_NUMERIC 				= /[^0-9]/;
	let G_S_REGEX_ALPHANUMERIC_GLOBAL 	= /[^A-Za-z0-9]/g;
	let G_S_REGEX_ALPHANUMERIC 			= /[^A-Za-z0-9]/;
	let G_S_REGEX_SYMBOL 				= /[-!$%^&*()_+|~=`{}\[\]:";'<>?,.\/]/;
	var G_S_REGEX_NO_KANJI 				= /[^-ぁ-ゟ゠-ヿ｡-ﾟA-Za-z0-9]/; // ONLY allow -, hiragana,half-width katakana, alphabhet, and numeric

/* == CHARACTER CONVERTER ============================================================================================================================== */
	



	/**
	 * Convert half-width katakana into full katakana
	 * Convert full-width alphanumeric into half-width alphanumeric
	 * Convert full-width space into half-width space */ 
	function convertChar(str) {
		var kanaMap = {
			/* 'あ' : 'ぁ' , 'い' : 'ｨ' , 'う' : 'ｩ' , 'え' : 'ｪ', 'お' : 'ｫ',
			'か' : 'ぁ' , 'き' : 'ｨ' , 'く' : 'ｩ' , 'け' : 'ｪ', 'こ' : 'ｫ',
			'さ' : 'ぁ' , 'し' : 'ｨ' , 'す' : 'ｩ' , 'せ' : 'ｪ', 'そ' : 'ｫ',
			'た' : 'ぁ' , 'ち' : 'ｨ' , 'つ' : 'ｩ' , 'て' : 'ｪ', 'と' : 'ｫ',
			'な' : 'ぁ' , 'に' : 'ｨ' , 'ぬ' : 'ｩ' , 'ね' : 'ｪ', 'の' : 'ｫ',
			'は' : 'ぁ' , 'ひ' : 'ｨ' , 'う' : 'ｩ' , 'え' : 'ｪ', 'お' : 'ｫ',
			'あ' : 'ぁ' , 'い' : 'ｨ' , 'う' : 'ｩ' , 'え' : 'ｪ', 'お' : 'ｫ',

 */


			'ガ': 'ｶﾞ', 'ギ':'ｷﾞ' , 'グ':'ｸﾞ' , 'ゲ':'ｹﾞ' , 'ゴ':'ｺﾞ' ,
			'ザ': 'ｻﾞ', 'ジ':'ｼﾞ' , 'ズ':'ｽﾞ' , 'ゼ':'ｾﾞ' , 'ゾ':'ｿﾞ' ,
			'ダ':'ﾀﾞ' , 'ヂ':'ﾁﾞ' , 'ヅ':'ﾂﾞ' , 'デ':'ﾃﾞ' , 'ド':'ﾄﾞ' ,
			'バ':'ﾊﾞ' , 'ビ': 'ﾋﾞ' , 'ブ' : 'ﾌﾞ' , 'ベ':'ﾍﾞ' , 'ボ':'ﾎﾞ' ,
			'パ':'ﾊﾟ' , 'ピ': 'ﾋﾟ' , 'プ' : 'ﾌﾟ' , 'ペ' : 'ﾍﾟ' , 'ポ' : 'ﾎﾟ' ,
			'ヴ' : 'ｳﾞ' , 'ヷ' : 'ﾜﾞ' , 'ヺ' : 'ｦﾞ' ,
			'ア' : 'ｱ' , 'イ' : 'ｲ' , 'ウ' : 'ｳ' , 'エ' : 'ｴ' , 'オ' : 'ｵ' ,
			'カ' : 'ｶ' , 'キ' : 'ｷ' , 'ク' : 'ｸ' , 'ケ' : 'ｹ' , 'コ' : 'ｺ' ,
			'サ': 'ｻ' , 'シ' : 'ｼ' , 'ス' : 'ｽ' , 'セ' : 'ｾ' , 'ソ' : 'ｿ' ,
			'タ' : 'ﾀ' , 'チ' : 'ﾁ' , 'ツ' : 'ﾂ' , 'テ' : 'ﾃ' , 'ト' : 'ﾄ' ,
			'ナ': 'ﾅ' , 'ニ': 'ﾆ' , 'ヌ':'ﾇ' , 'ネ':'ﾈ' , 'ノ':'ﾉ' ,
			'ハ' : 'ﾊ' ,'ヒ' : 'ﾋ', 'フ' : 'ﾌ', 'ヘ' : 'ﾍ', 'ホ' :'ﾎ' ,
			'マ' : 'ﾏ', 'ミ' : 'ﾐ' , 'ム' : 'ﾑ' , 'メ' : 'ﾒ', 'モ': 'ﾓ' ,
			'ヤ' : 'ﾔ' , 'ユ': 'ﾕ' , 'ヨ' : 'ﾖ' ,
			'ラ' :'ﾗ' , 'リ' : 'ﾘ','ル' : 'ﾙ', 'レ' : 'ﾚ', 'ロ' : 'ﾛ',
			'ワ' : 'ﾜ' , 'ヲ' : 'ｦ' , 'ン' : 'ﾝ' ,
			'ァ' : 'ｧ' , 'ィ' : 'ｨ' , 'ゥ' : 'ｩ' , 'ェ' : 'ｪ', 'ォ' : 'ｫ',
			'ッ' : 'ｯ', 'ャ' : 'ｬ', 'ュ' : 'ｭ', 'ョ' : 'ｮ',
			'。' : '｡' , '、' : '､' , 'ー' : 'ｰ', '「' : '｢','」' : '｣', '・' : '･', '　': ' '
		};
		// 全角英数、一部記号→半角
		// 半角カタカナ→全角
		// 全角スペース→半角
		var reg = new RegExp('(' + Object.keys(kanaMap).join('|') + ')', 'g');
		return str
				.replace(/[！-～]/g, function(match) {
					return String.fromCharCode(match.charCodeAt(0) - 0xFEE0);
				})
				.replace(reg, function(match) {
					return kanaMap[match];
				})
				.replace(/ﾞ/g, '゛')
				.replace(/ﾟ/g, '゜');

		
	}



	function bytes(str) {
		str 	   = str.replace(/[｡-ﾟ]/g, 'K');
		var hex    = '';
		for (var i = 0; i < str.length; i++) {
				hex += (('0000' + str.charCodeAt(i).toString(16)).slice(-4)).replace(/^00/, '');
		}
		return hex.length/2;
	}

	/* Remove character beyond specified length */
	function substr_modify(text, len) {
		var text_array 	= text.split('');
		var count 		= 0;
		var str 		= '';
		for (i = 0; i < text_array.length; i++) {
			var n  = escape(text_array[i]);
			count += bytes(text_array[i])
			if (count > len) {
				return str;
			}
			str += text.charAt(i);
		}
		text			= 	text.trim();
		return text;
	}

	



	/* == DISPLAY BEHAVIOUR ================================================================================================================================ */
	
/** Uncheck transfer checkbox when material checkbox is checked
	 *  @author Mario Ricardo Ariyanto
	 *  @since Version 0.0.1
	 *  @param object obj Checkbox's object*/
	function js_uncheck_product(obj)
        {
            if (obj.checked == true)
            {
                document.getElementById("i_model_type_product").checked = false;
            }
        }

	/** Uncheck discontinue checkbox when product checkbox is checked
	 *  @author Mario Ricardo Ariyanto
	 *  @since Version 0.0.1
	 *  @param object obj Checkbox's object*/
	function js_uncheck_material(obj)
        {
            if (obj.checked == true)
            {
                document.getElementById("i_model_type_material").checked = false;
            }
        }


	/** Uncheck transfer checkbox when discontinue checkbox is checked
	 *  @author Mario Ricardo Ariyanto
	 *  @since Version 0.0.1
	 *  @param object obj Checkbox's object*/
	/* function js_uncheck_transfer(obj)
        {
            if (obj.checked == true)
            {
                document.getElementById("i_status_transfer").checked = false;
            }
        } */

	/** Uncheck discontinue checkbox when transfer checkbox is checked
	 *  @author Mario Ricardo Ariyanto
	 *  @since Version 0.0.1
	 *  @param object obj Checkbox's object*/
	/* function js_uncheck_discontinue(obj)
        {
            if (obj.checked == true)
            {
                document.getElementById("i_status_discontinue").checked = false;
            }
        } */
	


	/** Enable sets of button when the model's input bar is focused
	 *  @author Mario Ricardo Ariyanto
	 *  @since Version 0.0.1 */ 
	/* function js_main_buttons_enable()
		{
			document.getElementById("i_model_name").disabled  			=	false;
			document.getElementById("i_invoice_model_name").disabled 	=	false;
			document.getElementById("i_forecast_model_name").disabled 	=	false;
			document.getElementById("i_alias_edi_model_name").disabled  =	false;
			document.getElementById("i_item_name").disabled 			=	false;
			document.getElementById("i_sub_name").disabled 				=	false;
			document.getElementById("i_car_model_name").disabled  		=	false;
			document.getElementById("i_development_name").disabled 		=	false;
			document.getElementById("i_edi_order").disabled 			=	false;
			document.getElementById("i_edi_supply").disabled  			=	false;
			document.getElementById("i_irregular_code").disabled 		=	false;
			document.getElementById("i_remarks").disabled 				=	false;
			
			document.getElementById("i_model_type_product").disabled 		=	false;
			document.getElementById("i_model_type_material").disabled 		=	false;
			document.getElementById("i_status_discontinue").disabled 		=	false;
			//document.getElementById("i_status_transfer").disabled 			=	false;
			
			document.getElementById("b_line_off_date").disabled  			=	false;
			document.getElementById("b_model_apply_date").disabled 			=	false;
			document.getElementById("b_model_save").disabled 				=	false;
			
		}
 */
		/**
		 * Disable all the inputs and remove the class 'input-disabled-white' from the inputs that have it.
		 */
		function js_input_disable()
		{
			console.log("js_input_disable");

			document.getElementById("i_model_name").disabled  			=	true;
			document.getElementById("i_invoice_model_name").disabled 	=	true;
			document.getElementById("i_forecast_model_name").disabled 	=	true;
			document.getElementById("i_alias_edi_model_name").disabled  =	true;
			document.getElementById("i_item_name").disabled 			=	true;
			document.getElementById("i_sub_name").disabled 				=	true;
			document.getElementById("i_car_model_name").disabled  		=	true;
			document.getElementById("i_development_name").disabled 		=	true;
			
			document.getElementById("i_edi_order_display").classList.remove('input-disabled-white');
			document.getElementById("i_edi_supply_display").classList.remove('input-disabled-white');
			document.getElementById("i_edi_order_search").disabled  					=	true;
			document.getElementById("i_edi_supply_search").disabled  					=	true;

			document.getElementById("i_irregular_code").disabled 		=	true;
			document.getElementById("i_remarks").disabled 				=	true;
			document.getElementById("i_status_discontinue").disabled 		=	true;
			document.getElementById("b_line_off_date").disabled  			=	true;
			document.getElementById("b_model_apply_date").disabled 			=	true;
			document.getElementById("i_line_off_input_display").classList.remove('input-disabled-white');
			document.getElementById("i_model_apply_date_input_display").classList.remove('input-disabled-white');
			document.getElementById("b_model_save").disabled 				=	true;
		}
	
		/**
		 * If the model is not 0, then disable the invoice, forecast, and alias edi model name fields,
		 * otherwise enable them.
		 */
		function js_input_enable(p_model)
		{
			console.log("js_input_enable");
			document.getElementById("i_model_name").disabled  			=	false;
			if (p_model == 0)
			{
				document.getElementById("i_invoice_model_name").disabled 	=	false;
				document.getElementById("i_forecast_model_name").disabled 	=	false;
				document.getElementById("i_alias_edi_model_name").disabled  =	false;
			}
			else
			{
				document.getElementById("i_invoice_model_name").disabled 	=	true;
				document.getElementById("i_forecast_model_name").disabled 	=	true;
				document.getElementById("i_alias_edi_model_name").disabled  =	true;
			}
			
			document.getElementById("i_item_name").disabled 					=	false;
			document.getElementById("i_sub_name").disabled 						=	false;
			document.getElementById("i_car_model_name").disabled  				=	false;
			document.getElementById("i_development_name").disabled 				=	false;

			document.getElementById("i_edi_order_display").classList.add('input-disabled-white');
			document.getElementById("i_edi_supply_display").classList.add('input-disabled-white');
			document.getElementById("i_edi_order_search").disabled  					=	false;
			document.getElementById("i_edi_supply_search").disabled  					=	false;

			document.getElementById("i_irregular_code").disabled 				=	false;
			document.getElementById("i_remarks").disabled 						=	false;
			
			document.getElementById("i_status_discontinue").disabled 			=	false;
			
			document.getElementById("b_line_off_date").disabled  				=	false;
			document.getElementById("b_model_apply_date").disabled 				=	false;
			document.getElementById("i_line_off_input_display").classList.add('input-disabled-white');
			document.getElementById("i_model_apply_date_input_display").classList.add('input-disabled-white');
			 
			document.getElementById("b_model_save").disabled 					=	false;
		}
	function f_master_save_failed()
		{
			setTimeout(function(){ f_master_modal_warning(G_S_SAVE_FAILED, function(){}); }, 500);
		}

/* == GET MODEL LIST =================================================================================================================================== */


	/**
	 * Check if current session is expired or not, if not then
	 * Call js_get_modellist function with default parameters and display m_productnumber_modal screen
	 * 
	 * @author Mario Ricardo Ariyanto
	 * @since Version 0.0.1
	 *  */
	function js_search_model(modal_sess=0)
		{
			//FUNCTION IS IN \views\master\session\master_session_js.php
			f_a_master_session_check(function(){
					G_CHECKED_PRODUCT 	= false;
					G_CHECKED_MAT		= false;
					var p_model_name 			= 	document.getElementById("i_search_model_name");
					var p_sub_name 				= 	document.getElementById("i_search_sub_name");
					var p_car_name 				= 	document.getElementById("i_search_car_name");
					var p_edi_order 			= 	document.getElementById("i_search_edi_order");
					var p_edi_supply 			= 	document.getElementById("i_search_edi_supply");
					//CHECKBOX
					var p_model_product			=	document.getElementById("i_search_model_type_product");
					var p_model_material		=	document.getElementById("i_search_model_type_material");
					var p_status_discontinue	=	document.getElementById("i_search_status_discontinue");
					var p_model					= '';
					var p_status				= '';

					if (p_model_product.checked ==  true && p_model_material.checked == false)
					{
						p_model = 0;
					}
					else if (p_model_product.checked ==  false && p_model_material.checked == true)
					{
						p_model = 1;
					}

					if (p_status_discontinue.checked ==  true)
					{
						p_status = 1;
					} 
					js_get_model_list(p_model_name.value ,p_sub_name.value ,p_car_name.value ,p_edi_order.value ,p_edi_supply.value, p_model, p_status);
				if (modal_sess == 1)
				{
					$('#modal_model_list').modal('show');
				}
				
			});
		}

	
	/**
	 * Get list of model's data from t560_model table filtered with five kinds of parameters
	 * 	- c_model_name, c_sub_name, c_car_model_name, c_t521_id_edi_order, c_t521_id_edi_supply
	 * If the parameters is not defined when the function is called, it will use '' as its default value (not filtered)
	 * The flow of the functions until data is auto filled after selected is:
	 * js_get_model_list (js) -> c_get_model_list (controller) -> mdl_get_model_list_table (model) -> f_generate_table_select (function) -> js_get_model_function_table (js) 
	 * @author Mario Ricardo Ariyanto
	 * @since Version 0.0.1
	 * @param string 	- p_model_name 	- if not blank, will be used to filter query based on its model name
	 * @param string 	- p_sub_name 	- if not blank, will be used to filter query based on its model sub name
	 * @param string 	- p_car_name 	- if not blank, will be used to filter query based on its car model name
	 * @param string 	- p_edi_order 	- if not blank, will be used to filter query based on its EDI order ID name
	 * @param string 	- p_edi_supply 	- if not blank, will be used to filter query based on its EDI supply ID name
	 * @return List of table data based on the query result
	 * */ 
	function js_get_model_list(p_model_name='', p_sub_name='', p_car_name='', p_edi_order='', p_edi_supply='', p_model='', p_status='')
		{
			$.ajax({
				/* CALL control_model_list function inside the controller folder, with a parameters */
				url: "<?php echo base_url(); ?>Productnumber/c_get_model_list?p_model_name="+p_model_name+
																			"&p_sub_name="+p_sub_name+
																			"&p_car_name="+p_car_name+
																			"&p_edi_order="+p_edi_order+
																			"&p_edi_supply="+p_edi_supply+
																			"&p_model="+p_model+
																			"&p_status="+p_status, 
				success: function(response) 
					{
						$("#modal_get_model_list").html(response);
					},
				complete: function () {
				}
			});
		}

/* == GET MODEL DATA AND AUTO FILL TO INPUT MENU ======================================================================================================= */

	/** Invoke sets of function that will auto fill input menu based on clicked variable
	 *  @param object - selected model's data inside the model table
	 *  @author Mario Ricardo Ariyanto
	 *  @since Version 0.0.1 */ 
	function js_get_model_function_table(p_var_input)
		{
			$('#modal_model_list').modal('hide'); // cloce modal screen
			js_disable_model_checkbox();

			const obj 			= JSON.parse(p_var_input);
			if(Object.values(obj)[15] <= G_PHP_DATE_NOW)
			{
				console.log("js_get_model_function_table js_fill_information");
				js_fill_information(Object.values(obj)); // insert data into input bar

			}
			else
			{
				console.log("js_get_model_function_table js_get_model_byID");
				js_get_model_byID(Object.values(obj)[16],false);

			}

			/* START AUTO SEARCH MAKER NAME BASED ON EDI ID */
			var i_edi_order = document.getElementById('i_edi_order');
			var i_edi_supply = document.getElementById('i_edi_supply');
			var onchange = new Event('change');
			i_edi_order.dispatchEvent(onchange);
			i_edi_supply.dispatchEvent(onchange);

			js_get_model_history(Object.values(obj)[16], js_fill_model_history_list); // get model history's change based on model's ID and then send the result to js_fill_model_history_list function

			setTimeout(function(){$('.collapse').collapse()},100);
			//document.getElementById('i_notif_product_id_success').innerHTML = '';
			G_BOOL_IS_INSERT = false;
			$('#i_model_name').focus();
			//js_main_buttons_enable();

			if (Object.values(obj)[11] == 1) // IF HINBAN IS MATERIAL THEN DISABLE SOME INPUT BAR
			{
				js_input_enable(1);
			}
			else{
				js_input_enable(0);
			}
			
			js_update_mode();
			
			
			
				
		}

	/** Insert value into each element based on ID.
	 *  @param string[] -  p_model_info_array - Array of data containing model's data
	 *  @author Mario Ricardo Ariyanto
	 *  @since Version 0.0.1 */ 
	function js_fill_information(p_model_info_array = ['','','','','','','','','','','',null,'',null,'','','NONE','NONE']) 
	{
		var i_model_name						= document.getElementById("i_model_name");						// 0
		var i_sub_name							= document.getElementById("i_sub_name");						// 1
		var i_car_model_name					= document.getElementById("i_car_model_name");					// 2
		var i_edi_order							= document.getElementById("i_edi_order");						// 3
		var i_edi_supply						= document.getElementById("i_edi_supply");						// 4

		var i_item_name							= document.getElementById("i_item_name");						// 5
		var i_invoice_model_name				= document.getElementById("i_invoice_model_name");				// 6

		var i_development_name					= document.getElementById("i_development_name");				// 7
		// UNDECIDED 
		var i_forecast_model_name				= document.getElementById("i_forecast_model_name");				// 8
		var i_alias_edi_model_name				= document.getElementById("i_alias_edi_model_name");			// 9

		var i_irregular_code					= document.getElementById("i_irregular_code");					// 10
		var i_model_type_product				= document.getElementById("i_model_type_product");				// 11
		var i_model_type_material				= document.getElementById("i_model_type_material");				// 11
		var i_line_off_input_display			= document.getElementById("i_line_off_input_display");			// 12
		var i_status_discontinue				= document.getElementById("i_status_discontinue");				// 13
		//var i_status_transfer					= document.getElementById("i_status_transfer");					// 13
		var i_remarks							= document.getElementById("i_remarks");							// 14
		var i_model_apply_date_input_display	= document.getElementById("i_model_apply_date_input_display");	// 15
		var i_model_id							= document.getElementById("i_model_id");						// 16
		var i_t560_id							= document.getElementById("i_t560_id");							// 17

		i_model_name.value 						= p_model_info_array[0];
		i_sub_name.value 						= p_model_info_array[1];
		i_car_model_name.value 					= p_model_info_array[2];
		i_edi_order.value 						= p_model_info_array[3];
		i_edi_supply.value 						= p_model_info_array[4]; 
		i_item_name.value 						= p_model_info_array[5];
		i_invoice_model_name.value 				= p_model_info_array[6];
		i_development_name.value 				= p_model_info_array[7];
		i_forecast_model_name.value 			= p_model_info_array[8];
		i_alias_edi_model_name.value 			= p_model_info_array[9];
		i_irregular_code.value 					= p_model_info_array[10];
		if (p_model_info_array[11] == 0 )
		{
			i_model_type_product.checked = true;
			i_model_type_material.checked = false;
		}
		else if (p_model_info_array[11] == 1)
		{
			i_model_type_product.checked = false;
			i_model_type_material.checked = true;
		}
		else{
			i_model_type_product.checked = false;
			i_model_type_material.checked = false;
		}

		i_line_off_input_display.value 			= p_model_info_array[12];

		if (p_model_info_array[13] == 1)
		{
			i_status_discontinue.checked = true;
			//i_status_transfer.checked = false;
		}
		/* else if (p_model_info_array[13] == 2)
		{
			i_status_discontinue.checked = false;
			i_status_transfer.checked = true;
		} */
		else
		{
			i_status_discontinue.checked = false;
			//i_status_transfer.checked = false;
		}

		i_remarks.value 						= p_model_info_array[14];
		i_model_apply_date_input_display.value 	= p_model_info_array[15];
		if (p_model_info_array[16] != 'NONE')
		{
			i_model_id.value 					= p_model_info_array[16];
		}
		else {i_model_id.value					= '';					}

		if (p_model_info_array[17] != 'NONE')
		{
			i_t560_id.value 					= p_model_info_array[17];
		}

	}

	/** Get list of change history for the selected model
	 *  @param string -  p_model_Id - model's ID
	 *  @param callback -  p_function_callback - set which function will receive a callback
	 *  @author Mario Ricardo Ariyanto
	 *  @since Version 0.0.1 */ 
	function js_get_model_history(p_model_Id, p_function_callback=null)
		{
			$.ajax({
				url: "<?php echo base_url(); ?>Productnumber/c_model_history/"+p_model_Id, 
				success: function(response) 
					{
						$("#m_model_history").html(response);
					},
				complete: function () {
					var c_model_history_return 	= document.getElementById('c_model_history_return').value;
					if(p_function_callback!=null){
						p_function_callback(c_model_history_return); // Send query result to js_fill_model_history_list function
					}
				}
			});
		}

	/** Insert value into each element based on ID.
	 *  @param string[] -  p_model_info_array - Array of data containing model's data
	 *  @author Mario Ricardo Ariyanto
	 *  @since Version 0.0.1 */ 
	function js_fill_model_history_list(c_model_history_return)
		{   //CALLED IN c_model_history_return
			var 	obj 									= js_get_json_history_list();
			//LATEST UPDATE (FIRST ROW)
			var 	list_latest_model_history_date 		= document.getElementById("list_latest_model_history_date");
			list_latest_model_history_date.value  = Object.values(obj)[0].edit_date;
			//CREATE TABLE LIST
			js_generate_table(Object.values(obj));
			
			// CHECK IF LIST DELETABLE
			js_validation_delete_change_list();
			
		}

	/** Get the JSON data for model change history's list
	 *  @author Mario Ricardo Ariyanto
	 *  @since Version 0.0.1 */ 
	function js_get_json_history_list()
		{//GET JSON DATA
			var 	ajax_return											= 	document.getElementById('c_model_history_return');
			var 	obj 												= 	JSON.parse(ajax_return.value); 
			return  obj;	
		}

	/** Clear model change history table's content
	 *  @author Mario Ricardo Ariyanto
	 *  @since Version 0.0.1 */ 
	function f_clear_table()
		{
			G_CHG_LIST_DISPLAY 			= false;
			$("#list_model_change_body tr").remove(); 
			//var i_employee_retire_date 	= document.getElementById("i_employee_retire_date").value = "";
		}

	/** Generate model change histroy table body
	 *  If the latest change's apply date is greater than current date, it will display delete button
	 *  @param object -  tableData - object containing mdl_get_model_history's query result
	 *  @author Mario Ricardo Ariyanto
	 *  @since Version 0.0.1 */ 
	function js_generate_table(tableData)
		{
			f_clear_table();
			var table 			= document.getElementById('list_model_change_table');
			var tableBody 		= document.getElementById('list_model_change_body');
			var disp_del_but 	= true;
			G_CHG_LIST_DISPLAY 	= true;
			G_HISTORY_COUNT			= 0;
			tableData.forEach(function(rowData) {
				var row 	= 	document.createElement('tr');
				
				

				var cell1 	= 	document.createElement('td');
								cell1.classList.add('align-middle');
								row.appendChild(cell1);
								cell1.insertAdjacentHTML("afterbegin", '<button class="btn btn-info px-1 py-0 kanjifont-big" id="i_list_model_view_cell" onclick="js_view_model_change_list('+G_HISTORY_COUNT+')"><i class="bi bi-search"></i></button>');

				var cell2 	= 	document.createElement('td');
								cell2.classList.add('align-middle');
								cell2.appendChild(document.createTextNode(rowData.model_name)); //based on query's column name
								row.appendChild(cell2);

				var cell3 	= 	document.createElement('td');
								cell3.classList.add('align-middle');
								cell3.appendChild(document.createTextNode(rowData.sub_name)); 
								row.appendChild(cell3);

				var cell4 	= 	document.createElement('td');
								cell4.classList.add('align-middle');
								cell4.appendChild(document.createTextNode(rowData.apply_date)); 
								row.appendChild(cell4);
								
				var cell5 	= 	document.createElement('td');
								cell5.classList.add('align-middle');
								cell5.appendChild(document.createTextNode(rowData.name));
								row.appendChild(cell5);
			
				var cell6 	= 	document.createElement('td');
								cell6.classList.add('align-middle');
								cell6.appendChild(document.createTextNode(rowData.edit_date));
								row.appendChild(cell6);

				var cell7 	= 	document.createElement('td');
							cell7.classList.add('align-middle');
							if (disp_del_but){
								row.appendChild(cell7);
								cell7.insertAdjacentHTML("afterbegin", '<button class="btn btn-danger btn-delete-list-cell p-0 kanjifont" id="i_list_model_delete_cell" onclick="js_delete_model_change_list()">削除</button>');
							}else{
								cell7.appendChild(document.createTextNode(''));
								row.appendChild(cell7);
							}
				disp_del_but= 	false;
				tableBody.appendChild(row);
				G_HISTORY_COUNT++;
			});
			table.appendChild(tableBody);
		}

	function js_view_model_change_list(p_row = '')
		{
			f_a_master_session_check(function(){
				
				js_fill_information(); // CALL FUNCTION WITHOUT INPUT PARAMETER, RESULTING IN CLEARING ALL VALUE FROM INPUT BAR AND CHECKBOX
				js_history_mode();
				
				var obj 						= 	js_get_json_history_list();
				js_get_t560_byID(Object.values(obj)[p_row].t560_id); // CALL FUNCTION TO RETRIEVE DATA FROM DATABASE BY MODEL ID
				js_input_disable();
			});
		}

	function js_get_t560_byID(p_t560_id = '')
		{
			$.ajax({										//IN CONTROLLERS
					url: "<?php echo base_url(); ?>Productnumber/c_get_t560_byID?p_t560_id="+p_t560_id,  //FILE IS IN CONTROLLER FOLDER
					success: function(response) 
						{
							$("#h_get_model_info").html(response); // temporary div to hold the newly created hidden input bar
						},
					complete: function () 
						{
							var i_c_560_check_return 	= 	document.getElementById('i_c_560_check_return').value;
							if(i_c_560_check_return == 0)
							{
								js_fill_information(); // CALL FUNCTION WITHOUT INPUT PARAMETER, RESULTING IN CLEARING ALL VALUE FROM INPUT BAR AND CHECKBOX
								$("#list_model_change_body tr").remove();  // CLEAR CHANGE HISTORY CONTENT
								//document.getElementById('i_notif_product_id_success').innerHTML = G_S_PROD_ID_NEW;
								G_BOOL_IS_INSERT = true;
								$('#i_model_name').focus();
							}
							else
							{
								js_fill_model_data_byID(i_c_560_check_return, 1); //CALL FUNCTION TO FILL INPUT BAR WITH MODEL'S DATA
								G_BOOL_IS_INSERT = false;
							}
						}
					});
		}
	/** Triggered when the delete button inside the change history's table is clicked
	 *  @author Mario Ricardo Ariyanto
	 *  @since Version 0.0.1 */ 
	function js_delete_model_change_list()
		{
			f_a_master_session_check(function(){
				js_delete_model_change();
			});
		}

	/** Validating if the latest record is deletable or not through its c_apply_date
	 *  If the apply date is after the current date, the data can be deleted. Otherwise it cannot be deleted.
	 *  @param object -  tableData - object containing mdl_get_model_history's query result
	 *  @author Mario Ricardo Ariyanto
	 *  @since Version 0.0.1 */ 
	function js_validation_delete_change_list(p_isReturn=false)
		{// Validating Deleteable Change in Employee Change List
			var 	obj 		= js_get_json_history_list();
			var     bool_return	= false;
			js_model_list_delete_button_disable();	//Disable the delete button
			if((new Date(Object.values(obj)[0].apply_date) > new Date(G_PHP_DATE_NOW)) && (Object.values(obj)[0].status == 'CHANGE'))
			{
				js_model_list_delete_button_enable();
				bool_return = true;
			}
			if(p_isReturn){
				return bool_return;
			}
		}

	/** Call js_delete_employee_change to do a delete query based on model change's ID and call js_delete_model_change_status after
	 *  @author Mario Ricardo Ariyanto
	 *  @since Version 0.0.1 */ 
	function js_delete_model_change()
		{
			var obj 						= 	js_get_json_history_list();

			if(js_validation_delete_change_list(true)) // CHECK IS TO SHOW DELETE BUTTON OR NOT
				{
					js_delete_employee_change(Object.values(obj)[0].model_change_id, js_delete_model_change_status);
				}
		}

	/** Call c_delete_model_change controller function to do a delete query
	 *  @author Mario Ricardo Ariyanto
	 *  @since Version 0.0.1 */ 
	function js_delete_employee_change(p_model_change_id, p_function_callback=null)
		{
			$.ajax({
				url: "<?php echo base_url(); ?>Productnumber/c_delete_model_change?p_model_change_id="+p_model_change_id, 
				success: function(response) 
					{
						$("#h_delete_model_change").html(response);
					},
				complete: function () {
					if(p_function_callback!=null){
						p_function_callback();
					}
				}
			});
	}

	/** Display a message to show that an item has been deleted, and then requery the field with current model's ID
	 *  @author Mario Ricardo Ariyanto
	 *  @since Version 0.0.1 */ 
	function js_delete_model_change_status()
		{
			f_master_toast_message(G_S_APP_NAME, G_S_TOAST_DELETED);
			var i_model_id 			= 	document.getElementById("i_model_id");
			js_oninput_model_id_char(i_model_id.value);

			if (G_MODE == "HISTORY")
			{
				js_input_disable();
			}

		}


	/** Shows delete button in model's change history
	 *  @author Mario Ricardo Ariyanto
	 *  @since Version 0.0.1 */ 
	function js_model_list_delete_button_enable ()
		{
			G_CHG_LIST_DELETE  	= true;
			if(G_CHG_LIST_DISPLAY){
				document.getElementById("i_list_model_delete_cell").disabled  		=	false;
				document.getElementById("i_list_model_delete_cell").style.display   	=	"block";
			}
		}

	/** Hide delete button in model's change history
	 *  @author Mario Ricardo Ariyanto
	 *  @since Version 0.0.1 */ 
	function js_model_list_delete_button_disable()
		{
			G_CHG_LIST_DELETE 	= false;
			if(G_CHG_LIST_DISPLAY){
				document.getElementById("i_list_model_delete_cell").disabled  =	true;
				document.getElementById("i_list_model_delete_cell").style.display   =	"none";
			}
		}

	
	





/* == DATE PICKER HANDLING ==================================================================================================================== */
	/** Display date picker to the screen based on input ID
	 *  @param string - p_id - Input ID
	 *  @param int - p_reserve_from_today - determine minimum date that can be selected starting from current date
	 *  @author Mario Ricardo Ariyanto
	 *  @since Version 0.0.1 */ 
	function js_date_picker(p_id=null, p_reserve_from_today=null, p_retire_input=false)
		{ 	
			// p_reserve_from_today -> Increase the minimum date based on the numeric value
			var min_date 					=	p_reserve_from_today;
			if(p_reserve_from_today!=null){
				var list_emp_change_date 	= 	document.getElementById("list_latest_employee_change_date");
				var emp_lastuse_date 		= 	document.getElementById("c_model_lastuse_return");
			//  # ==================================================================================

					// # COMPARE LATEST DATE (作業日付 と EMPLOYEE_CHANGE 日付)
					var compare 			=	f_date_latest_compare([list_emp_change_date.value, emp_lastuse_date.value]);
					var minimum 			=	f_addDays(compare, p_reserve_from_today);
						min_date 			=	minimum[1];

			}
			
			$("#"+p_id+"_display").datepicker({
													dateFormat 		:	"yy-mm-dd"
												,	monthNames 		:	["1月", "2月", "3月", "4月", "5月", "6月", "7月", "8月", "9月", "10月", "11月", "12月" ]
												, 	monthNamesShort : 	["1月", "2月", "3月", "4月", "5月", "6月", "7月", "8月", "9月", "10月", "11月", "12月" ]
												,	dayNamesMin		:	["日", "月", "火", "水", "木", "金", "土"] //FIXED IN v.0.0.3 #MARIO
												,	yearSuffix		:	""    //Adding a text below month and year picker
												,   minDate 		:	min_date
												, 	changeMonth 	: 	true
												, 	changeYear 		: 	true
												, 	showButtonPanel: true
      											,	closeText: 'クリア' // Text to show for "close" button
		  										,	currentText: '今日'
      											,	onClose: function (){
																			var event = arguments.callee.caller.caller.arguments[0];
																			// If "Reset" gets clicked, clear selected value
																			if ($(event.delegateTarget).hasClass('ui-datepicker-close')) {
																				$(this).val('');
																			}
																		}
												
			});
			$("#"+p_id+"_display").datepicker("show");
			
		}

	/** Take selected date from date picker and insert it into input bar
	 *  @param string - p_id - Input ID
	 *  @author Mario Ricardo Ariyanto
	 *  @since Version 0.0.1 */ 
	function js_get_datePicker(p_id=null, p_function_callback_oninputDate=null)
    	{
    		var get_date 	= 	$("#"+p_id+"_display").datepicker("getDate");
    		var y 			= 	get_date.getFullYear();
	    	var mt 			= 	get_date.getMonth()+1;
	    	var dt 			= 	get_date.getDate(); 
	    		mt			=	pad(mt)
		 		dt			=	pad(dt)
	    	document.getElementById(p_id).value 	= y+"-"+mt+"-"+dt;
	    	if(p_function_callback_oninputDate!=null){
	    		p_function_callback_oninputDate();
	    	}
    	}





/* == VALIDATION AND AUTO FILL DATA ON BLUR AND ENTER KEYPRESS EVENT ========================================================================== */
	
	
	/** Remove any character that is included in p_Regex scope
	 *  @param string -  p_input_string - strings that will be filtered
	 *  @param string -  p_Regex - regular expression that will act as the filter
	 *  @return string - string that has been filtered by the respective regex
	 *  @author Mario Ricardo Ariyanto
	 *  @since Version 0.0.1 */ 
	function js_str_replace(p_input_string, p_Regex)
		{
			return p_input_string.replace(p_Regex, '');
		}

	/** Receive 品番ID from i_model_id and do  
	 *  Clear the contents from the input bars f_i_employee_code_keyup() and check if the ID is already exist in database or not f_i_employee_code()
	 *  If exist it will auto fill the input bar, if not it will give new input model notification
	 *  @param string -  p_model_id - Model's ID retrieved from [i_model_id] input bar
	 *  @author Mario Ricardo Ariyanto
	 *  @since Version 0.0.1 */ 		
	//DEPRECATED
	function js_oninput_model_id_char(p_model_id)
		{
			
			//FUNCTION IS IN \views\master\session\master_session_js.php
			f_a_master_session_check(function(){
				js_fill_information(); // CALL FUNCTION WITHOUT INPUT PARAMETER, RESULTING IN CLEARING ALL VALUE FROM INPUT BAR AND CHECKBOX
				$("#list_model_change_body tr").remove();  // CLEAR CHANGE HISTORY CONTENT
				js_get_model_byID(p_model_id, false); // CALL FUNCTION TO RETRIEVE DATA FROM DATABASE BY MODEL ID
			});

		}		

	/** Function for when save button is pressed.
	 *  It will retrieve model id from the input bar for retrieving model's data from the database
	 *  @author Mario Ricardo Ariyanto
	 *  @since Version 0.0.1 */ 
	function js_save_model()
		{  	
			f_a_master_session_check(function(){
				if (G_MODE == "UPDATE")
				{
					console.log("G_MODE SAVE BUTTON = " + G_MODE);
					var i_model_id 		= 	document.getElementById("i_model_id");
					js_get_model_byID(i_model_id.value, true);
				}
				else if (G_MODE == "INSERT")
				{
					console.log("G_MODE SAVE BUTTON = " + G_MODE);
					js_get_model_byID('', true);
				}
			});
		}			

	/** Function to convert single digit numeric to its equivalent two digit numeric (0-9 into 00-09)
	 *  @author Mario Ricardo Ariyanto
	 *  @since Version 0.0.1 */ 
	function pad(n) {js_get_model_byID
		return n<10 ? '0'+n : n;
	}


	function js_check_item_not_null(p_model_name, p_sub_name, p_model_apply_date_input_display)
	{
		if(p_model_name == '' || p_model_name == null)
		{
			return 1;
		}
		else if(p_sub_name == '' || p_sub_name == null)
		{
			return 2;
		}
		else if(p_model_apply_date_input_display == '' || p_model_apply_date_input_display == null)
		{
			return 3;
		}
		else
		{
			return 0;
		}
	}
	/** If on_save is false, it will get data from DB and Call function that will fill input bars with data based on model ID 
	 *  If true, it will retrieve data from the input bar and do insert or update query
	 *  @param string -  p_model_id - Model's ID retrieved from [i_model_id] input bar
	 *  @param boolean -  on_save - If yes, it will do insert/update query. If no, it will do select query
	 *  @author Mario Ricardo Ariyanto
	 *  @since Version 0.0.1 */ 		
	function js_get_model_byID(p_model_id='', on_save=false)
		{
			document.getElementById('i_model_name_error').innerHTML = '';
			document.getElementById('i_sub_name_error').innerHTML = '';
			document.getElementById('i_model_apply_date_input_display_error').innerHTML = '';
			if (on_save) // WHEN SAVE BUTTON IS CLICKED
			{
				console.log("js_get_model_byID = "+p_model_id + ", savestate "+ on_save);

				// -------------------------------------- t560_model data --------------------------------------------------------
				var i_model_name						= document.getElementById("i_model_name");					
				var i_invoice_model_name				= document.getElementById("i_invoice_model_name");				
				var i_forecast_model_name				= document.getElementById("i_forecast_model_name");			
				var i_alias_edi_model_name				= document.getElementById("i_alias_edi_model_name");			
				var i_item_name							= document.getElementById("i_item_name");				
				var i_sub_name							= document.getElementById("i_sub_name");				
				var i_car_model_name					= document.getElementById("i_car_model_name");		
				var i_development_name					= document.getElementById("i_development_name");				
				// UNDECIDED 
				var i_edi_order							= document.getElementById("i_edi_order");				
				var i_edi_supply						= document.getElementById("i_edi_supply");					
				var model_type							= '';
				var i_irregular_code					= document.getElementById("i_irregular_code");			
				var i_line_off_input_display			= document.getElementById("i_line_off_input_display");			
				var status								= 0;
				var i_remarks							= document.getElementById("i_remarks");						

				var i_model_type_product				= document.getElementById("i_model_type_product");			
				var i_model_type_material				= document.getElementById("i_model_type_material");		
				var i_status_discontinue				= document.getElementById("i_status_discontinue");				
				//var i_status_transfer					= document.getElementById("i_status_transfer");

				if(i_model_type_product.checked == true){model_type = 0}
				else if(i_model_type_material.checked == true){model_type = 1}
				else {model_type == ''}
				if(i_status_discontinue.checked == true){status = 1}
				//else if (i_status_transfer.checked == true){status = 2}
				else {status = 0}
				// -------------------------------------- t561_model_change data --------------------------------------------------------
				//var i_model_id							= document.getElementById("i_model_id");					
				var i_model_apply_date_input_display	= document.getElementById("i_model_apply_date_input_display");	
				var i_employee_id_display				= document.getElementById("i_employee_id_display").innerHTML;
				
				const currentDate = new Date();
				var edit_date 							= currentDate.getFullYear() + "-" + pad(currentDate.getMonth() + 1) + "-" + pad(currentDate.getDate())
														 + " " + pad(currentDate.getHours()) + ":" + pad(currentDate.getMinutes()) + ":" + pad(currentDate.getSeconds())+ "." + currentDate.getMilliseconds();

				// ------------------------------------- TESTING HANDLING ---------------------------------------------------------------
				var p_noError = true;
				if(G_S_REGEX_NO_KANJI.test(i_sub_name.value) == true)
				{
					document.getElementById('i_sub_name_error').innerHTML = G_S_NO_KANJI;
					p_noError = false;
				}
				if(i_model_name.value == '' || i_model_name.value == null)
				{
					document.getElementById('i_model_name_error').innerHTML = G_S_REQUIRED_ITEM;
					p_noError = false;
				}
				if(i_model_apply_date_input_display.value == '' || i_model_apply_date_input_display.value == null)
				{
					document.getElementById('i_model_apply_date_input_display_error').innerHTML = G_S_REQUIRED_ITEM;
					p_noError = false;
				}

				if (p_noError) 
				{
					console.log("NO ERROR THEN G_BOOL_IS_INSERT STATUS IS = " + G_BOOL_IS_INSERT);
					if (G_BOOL_IS_INSERT)
					{
						
						$.ajax({
							url: "<?php echo base_url(); ?>Productnumber/c_insert_model?i_model_name="+i_model_name.value+
																						"&i_invoice_model_name="+i_invoice_model_name.value+
																						"&i_forecast_model_name="+i_forecast_model_name.value+
																						"&i_alias_edi_model_name="+i_alias_edi_model_name.value+
																						"&i_item_name="+i_item_name.value+
																						"&i_sub_name="+i_sub_name.value+
																						"&i_car_model_name="+i_car_model_name.value+
																						"&i_development_name="+i_development_name.value+
																						"&i_edi_order="+i_edi_order.value+
																						"&i_edi_supply="+i_edi_supply.value+
																						"&model_type="+model_type+
																						"&i_irregular_code="+i_irregular_code.value+
																						"&i_line_off_input_display="+i_line_off_input_display.value+
																						"&status="+status+
																						"&i_remarks="+i_remarks.value+
																						"&p_model_id="+p_model_id+
																						"&i_model_apply_date_input_display="+i_model_apply_date_input_display.value+
																						"&i_employee_id_display="+i_employee_id_display+
																						"&edit_date="+edit_date,
							success: function(response) 
								{
									$("#h_get_model_info").html(response); // temporary div to hold the newly created hidden input bar
								},
							complete: function () {
								var i_model_id 				= document.getElementById("i_model_id");
								var i_c_return_insert_all_transaction 	= ($('#i_c_return_insert_all_transaction').length);
								/* ============================== */
								// CHECK IF AJAX INSERT WORK FINE
									if(i_c_return_insert_all_transaction==1){
										var return_insert_transcation_result  =   document.getElementById('i_c_return_insert_all_transaction');
										// CHECK IF AJAX RETURN TRUE
										if(return_insert_transcation_result.value==0){
											f_master_save_failed();
										}else{
											if(G_MODE == "UPDATE")
											{
												js_get_model_byID(i_model_id.value, false);
												f_master_toast_message(G_S_APP_NAME, G_S_TOAST_UPDATED);
											}
											else if (G_MODE == "INSERT")
											{
												f_master_toast_message(G_S_APP_NAME, G_S_TOAST_INSERTED);
												js_fill_information();
											}


										}
									}else{
										f_master_save_failed();
									}      
							}
						});
						
					}
					else 
					{
						var i_t560_id							= document.getElementById("i_t560_id");	
						$.ajax({
							url: "<?php echo base_url(); ?>Productnumber/c_update_model?i_model_name="+i_model_name.value+
																						"&i_invoice_model_name="+i_invoice_model_name.value+
																						"&i_forecast_model_name="+i_forecast_model_name.value+
																						"&i_alias_edi_model_name="+i_alias_edi_model_name.value+
																						"&i_item_name="+i_item_name.value+
																						"&i_sub_name="+i_sub_name.value+
																						"&i_car_model_name="+i_car_model_name.value+
																						"&i_development_name="+i_development_name.value+
																						"&i_edi_order="+i_edi_order.value+
																						"&i_edi_supply="+i_edi_supply.value+
																						"&model_type="+model_type+
																						"&i_irregular_code="+i_irregular_code.value+
																						"&i_line_off_input_display="+i_line_off_input_display.value+
																						"&status="+status+
																						"&i_remarks="+i_remarks.value+

																						"&i_t560_id="+i_t560_id.value+
																						"&i_model_id="+i_model_id.value+
																						"&i_model_apply_date_input_display="+i_model_apply_date_input_display.value+
																						"&i_employee_id_display="+i_employee_id_display+
																						"&edit_date="+edit_date,
							success: function(response) 
								{
									$("#h_get_model_info").html(response); // temporary div to hold the newly created hidden input bar
								},
							complete: function () {
								var i_model_id 				= document.getElementById("i_model_id");
								var i_c_return_update_all_transaction 	= ($('#i_c_return_update_all_transaction').length);
								/* ============================== */
								// CHECK IF AJAX INSERT WORK FINE
									if(i_c_return_update_all_transaction==1){
										var return_update_transcation_result  =   document.getElementById('i_c_return_update_all_transaction');
										// CHECK IF AJAX RETURN TRUE
										if(return_update_transcation_result.value==0){
											f_master_save_failed();
										}else{
											js_get_model_byID(i_model_id.value, false);
											f_master_toast_message(G_S_APP_NAME, G_S_TOAST_UPDATED);
										}
									}else{
										f_master_save_failed();
									}      
							}
						});
					}
				}
				
			}
			else // AUTO FILL DATA (SAVE BUTTON IS NOT PRESSED)
			{
				console.log("js_get_model_byID = "+p_model_id + ", savestate "+ on_save);
				if (p_model_id.length != 0)
				{
					
					$.ajax({										//IN CONTROLLERS
					url: "<?php echo base_url(); ?>Productnumber/c_get_model_byID?p_model_id="+p_model_id,  //FILE IS IN CONTROLLER FOLDER
					success: function(response) 
						{
							$("#h_get_model_info").html(response); // temporary div to hold the newly created hidden input bar
						},
					complete: function () 
						{
							var i_c_model_check_return 	= 	document.getElementById('i_c_model_check_return').value;
							if(i_c_model_check_return == 0)
							{
								js_fill_information(); // CALL FUNCTION WITHOUT INPUT PARAMETER, RESULTING IN CLEARING ALL VALUE FROM INPUT BAR AND CHECKBOX
								$("#list_model_change_body tr").remove();  // CLEAR CHANGE HISTORY CONTENT
								//document.getElementById('i_notif_product_id_success').innerHTML = G_S_PROD_ID_NEW;
								G_BOOL_IS_INSERT = true;
								$('#i_model_name').focus();
							}
							else
							{
								js_fill_model_data_byID(i_c_model_check_return, 0); //CALL FUNCTION TO FILL INPUT BAR WITH MODEL'S DATA
								G_BOOL_IS_INSERT = false;
							}
						}
					});
				}
			}
		}	

	/** Call functions that will auto fill model's data with data from p_var_input
	 *  @param object -  p_var_input - Object that contain arrays of model's data
	 *  @author Mario Ricardo Ariyanto
	 *  @since Version 0.0.1 */ 	
	function js_fill_model_data_byID(p_var_input, p_id_type)
		{
			const obj 			= JSON.parse(p_var_input);
			js_fill_information(Object.values(obj)); // insert data into input bar

			/* START AUTO SEARCH MAKER NAME BASED ON EDI ID */
			var i_edi_order = document.getElementById('i_edi_order');
			var i_edi_supply = document.getElementById('i_edi_supply');
			var onchange = new Event('change');
			i_edi_order.dispatchEvent(onchange);
			i_edi_supply.dispatchEvent(onchange);

			if(p_id_type == 0)
			{
				js_get_model_history(Object.values(obj)[16], js_fill_model_history_list); // get model history's change based on model's ID and then send the result to f_fill_model_history_list function
				setTimeout(function(){$('.collapse').collapse()},100);
				//document.getElementById('i_notif_product_id_success').innerHTML = '';
				G_BOOL_IS_INSERT = false;
				$('#i_model_name').focus();
				if (G_MODE != "HISTORY")
				{
					js_input_enable(0);

				}
			}
			
		}
		

	function js_insert_model()
		{
			
			//FUNCTION IS IN \views\master\session\master_session_js.php
			f_a_master_session_check(function(){
				G_CHECKED_PRODUCT 	= false;
				G_CHECKED_MAT		= false;
				js_fill_information(); // CALL FUNCTION WITHOUT INPUT PARAMETER, RESULTING IN CLEARING ALL VALUE FROM INPUT BAR AND CHECKBOX
				/* START AUTO SEARCH MAKER NAME BASED ON EDI ID */
				var i_edi_order = document.getElementById('i_edi_order');
				var i_edi_supply = document.getElementById('i_edi_supply');
				var onchange = new Event('change');
				i_edi_order.dispatchEvent(onchange);
				i_edi_supply.dispatchEvent(onchange);
				$("#list_model_change_body tr").remove();  // CLEAR CHANGE HISTORY CONTENT
				js_input_disable();
				js_enable_model_checkbox();
				js_insert_mode();
				
			});

		}		

	
	function js_enable_model_checkbox()
	{
		document.getElementById('i_model_type_product').disabled 	= false;
		document.getElementById('i_model_type_material').disabled 	= false;
		
	}

	function js_disable_model_checkbox()
	{
		document.getElementById('i_model_type_product').disabled 	= true;
		document.getElementById('i_model_type_material').disabled 	= true;
		
	}

	
	function js_insert_mode()
	{
		document.getElementById('i_show_mode').innerHTML 	= 	G_S_MODE_INSERT;
		document.getElementById("i_show_mode").classList.remove('text-success');
		document.getElementById("i_show_mode").classList.remove('text-info');
		document.getElementById("i_show_mode").classList.add('text-warning');	
		document.getElementById('b_model_save').innerHTML 	= 	G_S_SAVE_BTN_INSERT;
		G_MODE 	= "INSERT";
		G_BOOL_IS_INSERT	= true;
		console.log("G_MODE = " + G_MODE);
	}

	function js_update_mode()
	{
		document.getElementById("i_show_mode").innerHTML 	= 	G_S_MODE_UPDATE;
		document.getElementById("i_show_mode").classList.remove('text-warning');
		document.getElementById("i_show_mode").classList.remove('text-info');
		document.getElementById("i_show_mode").classList.add('text-success');	
		document.getElementById("b_model_save").innerHTML 	=	G_S_SAVE_BTN_UPDATE;
		G_MODE	= "UPDATE";
		G_BOOL_IS_INSERT	= false;
		console.log("G_MODE = " + G_MODE);
	}

	function js_history_mode()
	{
		document.getElementById("i_show_mode").innerHTML 	= 	G_S_MODE_HISTORY;
		document.getElementById("i_show_mode").classList.remove('text-warning');
		document.getElementById("i_show_mode").classList.remove('text-success');
		document.getElementById("i_show_mode").classList.add('text-info');	
		document.getElementById("b_model_save").innerHTML 	=	G_S_SAVE_BTN_HISTORY;
		G_MODE	= "HISTORY";
		G_BOOL_IS_INSERT	= false;
		console.log("G_MODE = " + G_MODE);
	}

	function js_search_edi(p_edi_id = '', p_edi_name = '')
		{
			f_a_master_session_check(function(){
				
				js_get_edi_list(p_edi_id, p_edi_name);
				$('#modal_edi_list').modal('show');
			});
		}

	function js_clear_edi()
	{
		document.getElementById(document.getElementById("i_edi_type_name").value).value = '';
	}
	function js_get_edi_list(p_edi_id='', p_edi_name = '')
		{
			document.getElementById("i_edi_type").value = p_edi_id;
			document.getElementById("i_edi_type_name").value = p_edi_name;
			var p_search_edi_tdb			= 	document.getElementById("i_search_edi_tdb");
			var p_search_edi_maker 			= 	document.getElementById("i_search_edi_maker");
			var p_search_edi_section		= 	document.getElementById("i_search_edi_section");
			$.ajax({
				/* CALL control_model_list function inside the controller folder, with a parameters */
				url: "<?php echo base_url(); ?>Productnumber/c_get_edi_list?p_search_edi_tdb="+p_search_edi_tdb.value+
																			"&p_search_edi_maker="+p_search_edi_maker.value+
																			"&p_search_edi_section="+p_search_edi_section.value,
				success: function(response) 
					{
						$("#modal_get_edi_list").html(response);
					},
				complete: function () {
				}
			});
		}


	function js_get_edi_function(p_var_input)
		{
			$('#modal_edi_list').modal('hide'); // cloce modal screen
			const obj 			= JSON.parse(p_var_input);
			document.getElementById(document.getElementById("i_edi_type").value).value 	= Object.values(obj)[3];
			document.getElementById(document.getElementById("i_edi_type_name").value).value 	= Object.values(obj)[1] + "     " + Object.values(obj)[2];
			setTimeout(function(){$('.collapse').collapse()},100);
		}

	function js_get_edi_byID(i_edi_id = '', i_edi_name = '')
	{
		var p_edi_id = document.getElementById(i_edi_id);
		var p_edi_name = document.getElementById(i_edi_name);
		if(p_edi_id.value == '')
		{
			document.getElementById(i_edi_name).value = '';
		}
		else
		{
			$.ajax({
				/* CALL control_model_list function inside the controller folder, with a parameters */
				url: "<?php echo base_url(); ?>Productnumber/c_get_edi_byID?p_edi_id="+p_edi_id.value,
																			
																			
				success: function(response) 
					{
						$("#h_edi_name_change").html(response);
					},
				complete: function () {
					var i_c_get_EDI_return 	= 	document.getElementById('i_c_get_EDI_return').value;
					if(i_c_get_EDI_return == 0)
					{
						document.getElementById(i_edi_name).value = '';
					}
					else
					{
						const obj 			= JSON.parse(i_c_get_EDI_return);
						document.getElementById(i_edi_name).value = Object.values(obj)[0] + '     ' + Object.values(obj)[1];
					}
					
				}
			});
		}
		
	}
	/* function js_search_EDI_order(p_EDI_id = '')
	{
		$.ajax({
				url: "<?php /* echo base_url(); */ ?>Productnumber/c_search_EDI?p_EDI_id="+p_EDI_id,																			
				success: function(response) 
					{
						$("#h_get_EDI_order").html(response); // temporary div to hold the newly created hidden input bar
					},
				complete: function () {
					var i_c_get_EDI_return 	= 	document.getElementById('i_c_get_EDI_return').value;
							if(i_c_get_EDI_return == 0)
							{
								document.getElementById("i_edi_order_name").innerHTML = '';
							}
							else
							{
								const obj 			= JSON.parse(i_c_get_EDI_return);
								document.getElementById("i_edi_order_name").innerHTML = Object.values(obj)[0] + ' ' + Object.values(obj)[1];
							}
				}
			});
	}

	function js_search_EDI_supply(p_EDI_id = '')
	{
		$.ajax({
				url: "<?php /* echo base_url(); */ ?>Productnumber/c_search_EDI?p_EDI_id="+p_EDI_id,																			
				success: function(response) 
					{
						$("#h_get_EDI_order").html(response); // temporary div to hold the newly created hidden input bar
					},
				complete: function () {
					var i_c_get_EDI_return 	= 	document.getElementById('i_c_get_EDI_return').value;
							if(i_c_get_EDI_return == 0)
							{
								document.getElementById("i_edi_supply_name").innerHTML = '';
							}
							else
							{
								const obj 			= JSON.parse(i_c_get_EDI_return);
								document.getElementById("i_edi_supply_name").innerHTML = Object.values(obj)[0] + ' ' + Object.values(obj)[1];
							}
				}
			});
	} */



	


















































		




</script>