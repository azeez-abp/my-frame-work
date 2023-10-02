
let list     = [
	{
		color: "red",
		value: "#f00"
	},
	{
		color: "green",
		value: "#0f0"
	},
	{
		color: "blue",
		value: "#00f"
	},
	{
		color: "cyan",
		value: "#0ff"
	},
	{
		color: "magenta",
		value: "#f0f"
	},
	{
		color: "yellow",
		value: "#ff0"
	},
	{
		color: "black",
		value: "#000"
	},
	{
		color: "magenta",
		value: "#f0f"
	},
	{
		color: "yellow",
		value: "#ff0"
	},
	{
		color: "black",
		value: "#000"
	},
	{
		color: "magenta",
		value: "#f0f"
	},
	{
		color: "yellow",
		value: "#ff0"
	},
	{
		color: "black",
		value: "#000"
	}
	,
	{
		color: "magenta",
		value: "#f0f"
	},
	{
		color: "yellow",
		value: "#ff0"
	},
	{
		color: "black",
		value: "#000"
	},
	{
		color: "magenta",
		value: "#f0f"
	},
	{
		color: "yellow",
		value: "#ff0"
	},
	{
		color: "black",
		value: "#000"
	},
	{
		color: "magenta",
		value: "#f0f"
	},
	{
		color: "yellow",
		value: "#ff0"
	},
	{
		color: "black",
		value: "#000"
	},
	{
		color: "magenta",
		value: "#f0f"
	},
	{
		color: "yellow",
		value: "#ff0"
	},
	{
		color: "black",
		value: "#000"
	},
	{
		color: "magenta",
		value: "#f0f"
	},
	{
		color: "yellow",
		value: "#ff0"
	},
	{
		color: "black",
		value: "#000"
	},
	{
		color: "magenta",
		value: "#f0f"
	},
	{
		color: "yellow",
		value: "#ff0"
	},
	{
		color: "black",
		value: "#000"
	},
	{
		color: "magenta",
		value: "#f0f"
	},
	{
		color: "yellow",
		value: "#ff0"
	},
	{
		color: "black",
		value: "#000"
	},
	{
		color: "magenta",
		value: "#f0f"
	},
	{
		color: "yellow",
		value: "#ff0"
	},
	{
		color: "black",
		value: "#000"
	},
	{
		color: "magenta",
		value: "#f0f"
	},
	{
		color: "yellow",
		value: "#ff0"
	},
	{
		color: "black",
		value: "#000"
	},
	{
		color: "magenta",
		value: "#f0f"
	},
	{
		color: "yellow",
		value: "#ff0"
	},
	{
		color: "black",
		value: "#000"
	},
	{
		color: "magenta",
		value: "#f0f"
	},
	{
		color: "yellow",
		value: "#ff0"
	},
	{
		color: "black",
		value: "#000"
	},
	{
		color: "magenta",
		value: "#f0f"
	},
	{
		color: "yellow",
		value: "#ff0"
	},
	{
		color: "black",
		value: "#000"
	},
	{
		color: "magenta",
		value: "#f0f"
	},
	{
		color: "yellow",
		value: "#ff0"
	},
	{
		color: "black",
		value: "#000"
	},
	{
		color: "magenta",
		value: "#f0f"
	},
	{
		color: "yellow",
		value: "#ff0"
	},
	{
		color: "black",
		value: "#000"
	},
	{
		color: "magenta",
		value: "#f0f"
	},
	{
		color: "yellow",
		value: "#ff0"
	},
	{
		color: "black",
		value: "#000"
	}
]

let t  = ``
list.forEach((item,ind)=>{
 
  t += `<div class="item">${item.color} ${ind}</div>`  

})

document.querySelector(".list-cont").innerHTML   =t

let actions  = {
	 down  :false,
	 up: false,
	 move: false
}

let list_cont_coord  = {
	 y:0
}
let list_parent  =   document.querySelector('.list-parent')
let list_cont  =   document.querySelector('.list-cont')

function mouseDown(ev){
	ev.preventDefault()

	actions.down  =true 
	actions.up =false
	actions.move  =false
	list_cont.classList.add('p-absolute')

	let ele_on  = ev.target
   
   // console.log(ele_on, 'curren Element',ele_on.offsetTop+ (Math.floor(ele_on.offsetHeight/2)),ev.clientY )




}


 





function mouseUp(ev){
	ev.preventDefault()
	actions.down  =false 
	actions.up =true
	actions.move  =false
    //list_cont.classList.add('p-absolute')
 //    list_cont_coord.y  = ev.clientY +list_cont.offsetHeight
	// list_cont.style.top  =  list_cont_coord.y+"px"
  //  console.log(actions,list_cont.offsetTop)
}

 function mouseMove(ev){
	ev.preventDefault()
   


   if(actions.down){
   	var pos  = {prev:0,next:0}
	//actions.down  =false 
	actions.up =false
	actions.move  =true
	let parent_perimeter  = list_parent.getBoundingClientRect()
	let parent_top  = parent_perimeter.top
	let parent_bottom  = parent_perimeter.height
	let parent_mid_y  =  Math.floor(parent_top+parent_bottom /2)
	let list_cont_top  = list_cont.offsetTop
	let list_cont_bottom  = list_cont.offsetHeight
	let list_item  = list_cont.children[0];
	let cursor_position  = ev.changedTouches[0].clientY || ev.clientY
	pos.prev  =cursor_position 

        
     
       
      //  list_contX = $this.offset().left + width - mouseX,
        let list_contY_   = list_cont_top - (cursor_position )
       let list_contY = list_cont_top + list_cont_bottom - cursor_position;
       let maxDept  = list_cont_bottom  - (parent_bottom+parent_top)
         //let list_contY  =list_cont_coord.y   ;
        // list_contY -=1;
        if((list_contY_*-1) > (maxDept+(list_item.offsetHeight/2)) ) {
        	
        	list_contY_ = maxDept
        	//actions.down=false


        }
        if(list_contY_ > 0) list_contY_ = 0

	   // list_cont.offsetTop = list_contY
        list_cont.style.top  =   list_contY_+"px"
        console.log(maxDept, (list_contY_*-1),(maxDept+(list_item.offsetHeight/2)) )
    	console.log(list_cont_top,list_cont_bottom,cursor_position, parent_top,parent_bottom,)
   

  }

	//console.log(ev,parent_perimeter,list_cont_top,list_cont_bottom,parent_mid_y )
}



// list_parent.addEventListener('mousedown',mouseDown)
// list_parent.addEventListener('mouseup',mouseUp)
// list_parent.addEventListener('mousemove',mouseMove)

list_parent.addEventListener('touchstart',mouseDown)
list_parent.addEventListener('touchend',mouseUp)
list_parent.addEventListener('touchmove',mouseMove)

// list_parent.addEventListener('dragtart',mouseDown)
// list_parent.addEventListener('dragend',mouseUp)
// list_parent.addEventListener('dragmove',mouseMove)
list_parent.addEventListener('click',function(ev){

	console.log(ev.clientX,ev.clientY)
})