// Define a parent object
var Animal = function(name) {
    this.name = name;
  };
  
  Animal.prototype.getName = function() {
    return this.name;
  };
  
  // Define a child object that inherits from the parent object
  var Dog = function(name, breed) {
    Animal.call(this, name);
    this.breed = breed;
  };
  
  Dog.prototype = Object.create(Animal.prototype);
  Dog.prototype.constructor = Dog;
  
  Dog.prototype.getBreed = function() {
    return this.breed;
  };
  
  // Create an instance of the child object
  var myDog = new Dog("Rufus", "Labrador Retriever");
  
  // Access properties and methods of the parent and child objects
  console.log(myDog.getName());    // Output: "Rufus"
  console.log(myDog.getBreed());   // Output: "Labrador Retriever"
  console.dir(new Animal())

  function Make(){ 
    this. name  = 'make'
    

  }
  function Make2(part){ 
    this.age  = 45
    this.calls  = (part)=>{
        console.log(this,part)
    }
  }
  Make.call(new Make2(),'head');

  console.dir(new Make())

  function greet(names,number,age) {
    console.log(`Hello, ${this.name}  ${this.tell()}!` ,this);
  }
  
  const person = {
    name: 'John',
    tell:function(){
        console.log(this,"this a")
    }
    
  };
  //greet()

  greet.call(person); // the call the function WSSSS
  console.log(  Object.entries(person))

  //function.call(object,function_params)
//instead of calling the function immediately like call(), bind() returns a new function with the this value already set.

const obj = {
    name: 'John',
    greet: function() {
      console.log(`Hello, ${this.name}`);
    }
  };
  
  const obj2 = {
    name: 'Jane'
  };
  
  const greeting = obj.greet.bind(obj2); // this retun a funtion
  
  greeting();


  x =  1 
  console.log('x='+1);
  var x = 1;

  let arr   = [199,23,44,34,45];
  let pos23  = arr.indexOf(23)
  let newArr  = [...arr.slice(0,pos23),300,...arr.slice(pos23)   ]
  console.log(newArr)

  //sfc /scannow
  const comm  = process.argv
  /*in terminal write  node ztest.js add lcklamkdclkcds out put is  
  [
  'C:\\Program Files\\nodejs\\node.exe',
  'C:\\xampp\\htdocs\\code\\ztest.js',
  'add',
  'lcklamkdclkcds'
]*/ 
  console.log(comm, "qww")

  /*
node inspect filename  
open browser
click node logo  
*/

//teck expert azeezadio7895

