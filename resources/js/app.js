import { get } from 'lodash';
import './bootstrap';

import $ from 'jquery'


$('#register').click(function(){
    let name = $("#examForm input[name='name']").val();
    let email = $("#examForm input[name='email']").val();
    $.ajax({
        type:'get',
        data:{'name':name,'email':email},
        url:'/user/register',
        success: function(data){
            if(data.status == 403){
                alert(data.msg)
            }else if(data.status == 200){
                $('.inner').removeClass('d-none')
                $('input[type=submit]').removeClass('d-none')
                $('#register').addClass('d-none')
                $("#examForm input[name='name']").attr('readonly', true);
                $("#examForm input[name='email']").attr('readonly', true);
                
            }else{
                console.log(data)
            }
        }
    })
})
$('#examForm').submit(function(e){
    e.preventDefault()
    $.ajax({
        type:'post',
        data:$(this).serialize(),
        url:'/user/submit-answer',
        success: function(data){
            if(data.status == 200){
                location.href = '/user/result/' + data.msg;
            }else{
                alert(data.msg)
            }
        }
    })
})
$(document).ready(function() {
    $('.option_radio').on('click', function() {
        var questionId = $(this).data('question');
        var optionValue = $(this).val();
        $('#question_' + questionId).val(optionValue);
    });
});