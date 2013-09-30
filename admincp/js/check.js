
function echeck(str) {
	    var at = "@"
	    var dot = "."
	    var lat = str.indexOf(at)
		var lstr = str.length
	    var ldot = str.indexOf(dot)
	    if (str.indexOf(at) == -1) {	        
	        return false
	    }
	    if (str.indexOf(at) == -1 || str.indexOf(at) == 0 || str.indexOf(at) == lstr) {	        
	        return false
	    }
	    if (str.indexOf(dot) == -1 || str.indexOf(dot) == 0 || str.indexOf(dot) == lstr) {	        
	        return false
	    }
	    if (str.indexOf(at, (lat + 1)) != -1) {	        
	        return false
	    }
	    if (str.substring(lat - 1, lat) == dot || str.substring(lat + 1, lat + 2) == dot) {	        
	        return false
	    }
	    if (str.indexOf(dot, (lat + 2)) == -1) {
	        return false
	    }
	    if (str.indexOf(" ") != -1) {	        
	        return false
	    }
	    return true
	}
	
function checknull(ND)
{
	var i =0;
	var chuoi ="";
		for(i;i<ND.length;i++)
		{		
			if(ND[i]==' ')
				  ND[i]='';
			else
				chuoi=chuoi+ND[i];
		}
		 if (chuoi.length ==0)
        {            
            return false;
        }
        else
            return true;
    
} 
function saveExam()
	{	
		//alert("tui");
		var hoten =  document.myform.fullName.value;
		var cauhoi =  document.myform.content.value;		
		var email =  document.myform.email.value;
		var phone =  document.myform.phone.value;
	
		
		
		 var kq = echeck(email);
		 var flag = 0;
		 
		 if(checknull(hoten)==false)
		 {			data = "* Tên không được bỏ trống <br />"; 	$('#error_hoten').html(data);			flag++;	}
		 else
		 {			data = " ";		 	$('#error_hoten').html(data); 	}
		 
		
		 
		  if(checknull(phone)==false)
		 {			data = "* Điện thoại không được bỏ trống<br />"; 	$('#error_phone').html(data);			flag++;	}
		 else
		 {			data = " ";		 	$('#error_phone').html(data); 	}
		 
		
		  if(checknull(cauhoi)==false)
		 {			data = "* Câu hỏi không được bỏ trống<br />"; 	$('#error_cauhoi').html(data);			flag++;	}
		  else if(cauhoi.length > 1000)
		 {			data = "* Không được quá 1000 kí tự <br />"; 	$('#error_cauhoi').html(data);			flag++;	}
		 else 
		 {			data = " ";		 	$('#error_cauhoi').html(data); 	}
		 
		 
		 if(kq==false)
		 {
			data = "* Email không đúng định dạng<br/>";
		 	$('#error_email').html(data);
			flag++;
		 }
		   else
		 {
			data = " ";
		 	$('#error_email').html(data);
			
		 }
		 //alert (flag);
		 
		 if(flag==0)
		 {
			document.myform.submit();
		 }
		
	}
