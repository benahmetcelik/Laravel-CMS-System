/*
Template Name: Color Admin - Responsive Admin Dashboard Template build with Twitter Bootstrap 4
Version: 4.6.0
Author: Sean Ngu
Website: http://www.seantheme.com/color-admin/admin/
*/

var handleAjaxConsoleLog = function(settings, response) {
	var s = [], str;
	s.push(settings.type.toUpperCase() + ' url = "' + settings.url + '"');
	for (var a in settings.data) {
		if (settings.data[a] && typeof settings.data[a] === 'object') {
			str = [];
			for (var j in settings.data[a]) {
				str.push(j+': "'+settings.data[a][j]+'"');
			}
			str = '{ '+str.join(', ')+' }';
		} else {
			str = '"'+settings.data[a]+'"';
		}
		s.push(a + ' = ' + str);
	}
	s.push('RESPONSE: status = ' + response.status);

	if(response.responseText) {
		if($.isArray(response.responseText)) {
			s.push('[');
			$.each(response.responseText, function(i, v){
				s.push('{value: ' + v.value+', text: "'+v.text+'"}');
			});
			s.push(']');
		} else {
			s.push($.trim(response.responseText));
		}
	}
	s.push('--------------------------------------\n');
	$('#console').val(s.join('\n') + $('#console').val());
};

var handleEditableFormAjaxCall = function() {

	// mockjax used to create a fake ajax call without a host
	//$.mockjaxSettings.responseTime = 500;

	$.mockjax({
        url:"{!! route('admin.settings.update') !!}",
        type: 'POST',
        data : {
            id : 'deneme',
            '_token' : "{!! csrf_token() !!}"
        },
        success:function (response){

            $(this).prop('checked', response);
            if (response == true){
                admin_respones('Başarıyla Güncellendi','Post Güncelleme İşlemi Başarılı Oldu','success');
            }else{
                admin_respones('Başarısız Oldu','Post Güncelleme İşlemi Başarısız Oldu','error');
            }
        }
		/*
        response: function(settings) {
			handleAjaxConsoleLog(settings, this);
		}
        */
	});


};

var handleEditableFieldConstruct = function() {
	$.fn.editable.defaults.mode = 'inline';
	$.fn.editable.defaults.inputclass = 'form-control input-sm';
	$.fn.editable.defaults.url = '/update';
	$('#username').editable();

	$('#note').editable({
		showbuttons : 'left'
	});
};

var FormEditable = function () {
	"use strict";
	return {
		//main function
		init: function () {
			handleEditableFormAjaxCall();
			handleEditableFieldConstruct();
		}
	};
}();

$(document).ready(function() {
	FormEditable.init();
});
