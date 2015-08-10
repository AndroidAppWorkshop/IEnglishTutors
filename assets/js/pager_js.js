var btn_next = document.getElementsByClassName("next")[0];
var photo_1 = btn_next.nextElementSibling.children[0];
var photo_2 = photo_1.parentNode.nextElementSibling.children[0];
var photo_3 = photo_2.parentNode.nextElementSibling.children[0]
var photo_4 = photo_3.parentNode.nextElementSibling.children[0]

var click_state = 0;
var pre_number = new Array();
var next_number = new Array();

btn_next.onclick = function(){

	rand_number = make_number();
	pre_number = rand_number.slice(0,4);
	next_number = rand_number.slice(4,8);

	if(click_state==0){
		photo_1.src='/asset/images/'+ pre_number[0] +'.jpg';
		photo_2.src='/asset/images/'+ pre_number[1] +'.jpg';
		photo_3.src='/asset/images/'+ pre_number[2] +'.jpg';
		photo_4.src='/asset/images/'+ pre_number[3] +'.jpg';
		click_state = 1;
	}else {
		photo_1.src='/asset/images/'+ next_number[0] +'.jpg';
		photo_2.src='/asset/images/'+ next_number[1] +'.jpg';
		photo_3.src='/asset/images/'+ next_number[2] +'.jpg';
		photo_4.src='/asset/images/'+ next_number[3] +'.jpg';
		pre_number.length = 0;
		next_number.length =0;
		click_state = 0;
	}

}

function make_number(){

	var rand_number = new Array();

	while(rand_number.length < 8){

		var number = 1 + (Math.floor(Math.random() * 10));	

		if(rand_number.indexOf(number)<0){
			rand_number.push(number);
		}
	}

	return rand_number;
}