const  element  = {
	score : document.querySelector(".score"),
	startScreen: document.querySelector('.start-screen'),
	welcomeScreen: document.querySelector('.start'),
	gameArea:document.querySelector('.game-area')
}

let keyToTrack   = {
	 ArrowUp :false,//^
	 ArrowDown: false,//v
	 ArrowLeft: false,//<
	 ArrowRight:false//>
}

let player  = {
	start:false,
	
}

function keyUp(ev){
	ev.preventDefault()
	keyToTrack[ev.key] = false
 //console.log(ev.which,ev.key,keyToTrack)
}

function keyDown(ev){
	ev.preventDefault()
    keyToTrack[ev.key] = true

 //console.log(ev.which,ev.key,keyToTrack)
}

function keyLeft(ev){
	ev.preventDefault()
	keyToTrack[ev.key] = false
 //console.log(ev.which,ev.key,keyToTrack)
}

function keyRight(ev){
	ev.preventDefault()
	keyToTrack[ev.key] = true
 //console.log(ev.which,ev.key,keyToTrack)
}

function startGame(){
    player.start  =true
    if(player.start){
    	 moveLine() 
      let players  =  document.querySelector(".car")
          players.classList.add('has-key-down')
       let gameContainer  = element.gameArea.getBoundingClientRect();

       if(keyToTrack.ArrowDown && player.y > 0) player.y -=speed
       if(keyToTrack.ArrowUp &&  players.offsetTop >0 ) player.y +=speed
       if(keyToTrack.ArrowLeft && player.x > 0 ) player.x -=speed
       if(keyToTrack.ArrowRight && ( (players.offsetLeft +players.offsetWidth) <= gameContainer.width) ) player.x +=speed
       	players.style.left = player.x+'px'
        players.style.bottom = player.y+'px'
       //console.log(players.offsetTop ,players.offsetHeight,gameContainer )	
       window.requestAnimationFrame(startGame)




    }
 
}
 let lanes_coord  = {};
 let speed  = 5

  function moveLine(){
  		let gameContainer  = element.gameArea.getBoundingClientRect();
  	document.querySelectorAll(".lane").forEach((line,k)=>{
           
           lanes_coord['y'+k] +=speed  
             
           lanes_coord['y'+k]  
           if(lanes_coord['y'+k] > gameContainer.height){
            	let np  = gameContainer.top - line.offsetHeight
            	lanes_coord['y'+k]  = np
           }
	         
           line.style.top  = lanes_coord['y'+k]+'px'
          
          
  	} )
 	console.log(lanes_coord)
  	 //window.requestAnimationFrame(moveLine)
  }

function start(){
	element.welcomeScreen.classList.add('hide');
	element.gameArea.classList.remove('hide')
	let  car = `<div class="car">Car</div>`;
	element.gameArea.insertAdjacentHTML('afterBegin',car)
	let gameContainer  = element.gameArea.getBoundingClientRect();

 for (let i = 0; i < 5; i++) {
 	   let line  = `<div class="lane" style="top:${i*95+25}px"></div>`
 	   element.gameArea.insertAdjacentHTML('beforeEnd',line)
     }

document.querySelectorAll(".lane").forEach((line,k)=>{
           
            lanes_coord['y'+k]  =line.offsetTop
             //line.style.top  = lanes_coord['y'+k]  
           // console.log(lanes_coord)      
  	} )



	player.y  = document.querySelector(".car").offsetTop
	player.x  = document.querySelector(".car").offsetLeft

	player.Y  = document.querySelector(".car").offsetHeight
	player.X  = document.querySelector(".car").offsetWidth


	w  = player.X  - player.x
	h  = player.Y  - player.y
//	console.log({w,h})
	
	    console.log(lanes_coord) 
   window.requestAnimationFrame(startGame)

}



element.startScreen.addEventListener('click', function(el){
   console.log( {ot:this.offsetTop,oh:this.offsetHeight, ol:this.offsetLeft,ow:this.offsetWidth})
  start()	
})
	document.addEventListener('keyup',function(ev){
		 keyUp(ev) 
		 console.log(ev)

	})
	document.addEventListener('keydown', keyDown)

	document.addEventListener('click',function(ev){
        console.log(ev)
	}) 
	/*
layerX: 505
layerY: 126

movementX: 0
movementY: 0

offsetX: 505
offsetY: 126

pageX: 505
pageY: 126

screenX: 505
screenY: 197

tiltX: 0
tiltY: 0

x: 505
y: 126
	*/