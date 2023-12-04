       window.onload = function(){
            var loved_btn_x = 1;
            // 当没收藏，loved_btn_x设置1，收藏设置2就行，不知道能不能做到。
            var loved_btn = document.getElementById('loved_btn');
            loved_btn.onclick = function(){
                if(loved_btn_x == 1){
                    loved_btn_x = 2;
                    loved_btn.classList.add('loved');
                }else{ 
                    loved_btn_x = 1;
                    loved_btn.classList.remove('loved');
                }
            }
        }