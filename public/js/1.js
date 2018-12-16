onload=function(){
			 var box=document.getElementById('box');
			 var span=box.getElementsByTagName('span')

			span[0].onclick=function(){
		 	box.style.display="none"
							 }
			//
			var box1=document.getElementById('box1');
			var box2=document.getElementById('box2')
			var scrollTop = document.documentElement.scrollTop || document.body.scrollTop
			window.onscroll=function(){
               var scrollTop = document.documentElement.scrollTop || document.body.scrollTop
				
                if(scrollTop>=200){
                	 box1.style.position="fixed";
                	 box1.style.top=0;

                	 box2.style.display="block"
                	//console.log(111)
                }else{
                	 box1.style.position="absolute";
                	 box1.style.top=200+'px';
                	 box2.style.display="none"
                }
			}
			box2.onclick=function(){

				 document.documentElement.scrollTop = document.body.scrollTop =0;
				
			}
		}