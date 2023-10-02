"use strict";
let vector  = {

	x:1,
	y:0,
	constructor:function(){
		console.log(this,"this");
	},
 
	setX:function(value){
      console.log(this)
      this.x  = value;
	},
	getX: function(){
		return this.x
	},
	setY:function(value){
      
      this.y  = value;
	},
	getY: function(){
		return this.y
	},

	setAngle:function(angle){
         var lenght  = this.getLen();
         this.x  = Math.cos(angle)*lenght  /*sin0 = y/r*/
         this.y  = Math.sin(angle)*lenght


	},
	getAngle: function(){
		return Math.atan2(this.y,this.x) /*0  = tan-1(y/x) */
	},

	setYLen:function(lenght){
         var angle  = this.getAngle();
         this.x  = Math.cos(angle)*lenght  /*sin0 = y/r make y 
         the subject of formulae*/
         this.y  = Math.sin(angle)*lenght
	},
	getLen: function(){
		return Math.sqrt(this.x*this.x,this.y*this.y)  /*r2= x2+y2 */
	}

}
let v1  = vector
console.log(v1);