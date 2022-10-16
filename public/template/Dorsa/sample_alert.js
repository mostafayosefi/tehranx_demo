 
 if(document.getElementById("txt4").value=='ورودی نامعتبر') { 
    let now_time = Math.round(Date.now()/1000); 
    let oneminute = Math.round(now_time+60); 
    
    if(sessionStorage.getItem('check_codemelli')==null){ 
        sessionStorage.setItem('check_codemelli', 1); 
        sessionStorage.setItem('oneminute', now_time); }else{
             let count_check_codemelli = parseFloat(sessionStorage.getItem('check_codemelli')); 
             sessionStorage.setItem('check_codemelli', count_check_codemelli + 1 );
              sessionStorage.setItem('oneminute', now_time); 
            } 
            

 if( sessionStorage.getItem('check_codemelli') > 4 ){ 
    sessionStorage.setItem('oneminute', oneminute); 
    document.getElementById("sbt1").disabled = true; 
    document.getElementById('txt1').value = ''; 
    document.getElementById('cap1').value = ''; 
    document.getElementById('cld1').value = ''; 
    alert ('اخطار! به دلایل امنیتی حساب شما به مدت یک دقیقه بلاک می باشد لطفا لحظاتی دیگر دوباره امتحان کنید'); 
} } else{
    sessionStorage.clear();
}
 
