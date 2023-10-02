
function animationball(){
  return function(){
    /////////////////////////////////////////////////////////////////
    class Ball {
      constructor(x, y, velX, velY, color, size) {
        this.x = x;
        this.y = y; 
        this.size = size;
        this.velX = velX;
        this.velY = velY;
        this.color = color;

      }
    }
    /////////////////////////////////////////////////////////
    
  }
}
animationball()()
// Define an object with a property to be watched
const person = {
    name: '',
    age : '',
    
    // Getter for the 'name' property
    get getName() {
      return this.name;
    },
    
    // Setter for the 'name' property
    set setName(value) {
      console.log(`Setting name to: ${value}`);
      this.name = value;
    },

    set setAge(age){
      this.age  = age
      console.log(this.age)
    },
   
    get getAge(){
        return this.age
    },

    introduction(){
        console.log(`I am ${this.name} and ${this.age} old which means i was born   ${new Date( new Date().getTime() - (200*365*24*60*60*1000)   ).toISOString() }  year ago `)
    }

  };
  
  // Use the watched expression
  person.setName = 'John'; // This will trigger the setter and log the message
  person.setAge  = 200
  person.introduction()
  console.log(person.getName,person.age);
   // This will retrieve the value using the getter
  

   


   const obj = Object.create({}, {
    name: {
      //value: "Adio azeez",
      //writable: true,
      enumerable: true,
      configurable: true,
      _name: "Adio azeez", // Add a separate variable to hold the value
      set: function(name) {
        this._name = name;
      },
      get: function() {
        return this._name;
      }
    },
    email: {
      value: "adioadeyori@gmail.com",
      writable: true,
      enumerable: true,
      configurable: false
    },
    password: {
      value: "kolokololaisi",
      writable:true,
      enumerable: false,
      configurable: false
    },
    call_: function() {
      return this;
    }
  });
  


let obj2  = Object.defineProperties({}, {
    name: {
      //value: "Adio azeez", accessor(getter/setter) and writable/value can not co-exist
      //writable: true,
      enumerable: true,
      configurable: true,
      _name: "Adio azeez", // Add a separate variable to hold the value
      set: function(name) {
        this._name = name;
      },
      get: function() {
        return this._name;
      }
    },
    email: {
      value: "adioadeyori@gmail.com",
      writable: true,
      enumerable: true,
      configurable: false
    },
    password: {
      value: "kolokololaisi",
      writable:true,
      enumerable: false,
      configurable: false
    },
    call_: function() {
      return this;
    }
  } )

  console.log(obj)

  setTimeout(()=>{console.log("OUT")},200)
 const data  = new Promise((res,rej)=>{
    let data  = [232,3,4,,5,232,5]
     if(data){
        res(data)
     }
 }) 


 data.then(d=>{
    console.log(d)
 })

  
 

 /////////////////////////////////////////////////////////////////////////////////////////////////
 function strRan(howMany =10, nature='0',same=true,type='',callbackFormatStr=null){ 
 
   switch(type){
    case 'alpa':
        str=  `abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ` 
        break 
    case 'num':
        str=  `1234567890`
        break 
    case 'alphanum':
       str= `abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890`
       break 
    case 'alphanumspecial':
        str = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890!@#$%^&*()_+~[{}{]\\|/.,<>'
        break
    default :
       throw new Error ("Unknow str type: tyep(fouth augumet to "+strRan.name+") is one of  alpa,num,alphanum,alphanumspecial")
   }
        
    let len  = str.length
    console.log(len,str,type)
   
    let start  = 0;
    let max=  Math.floor(Math.random()*(howMany+1))
    let min=  Math.floor(Math.random()*(howMany+1)+howMany) 
    let end  =  nature==='0'? howMany: (nature==='+'?max: min )
 //   console.log( str.charAt(index),end)
     let output  = ''
     if(same){
        let index  = Math.floor(Math.random()*(len-1))
        for (let start = 0; start < end; start++) {
          
              output +=str.charAt( index);
         }
     }else{
        for (let start = 0; start < end; start++) {
            let index  = Math.floor(Math.random()*(len-1))
              output +=str.charAt( index);
         }
     }
     
     if(callbackFormatStr){
       return callbackFormatStr(output)
     }else{
        return ouput  
     }
   

}

function formatStr(str){
 console.log(str)
let start = 0 
let inc  =  3;
let res  = '';
let step  = 3
   while(str.length > start){
     res += str[start]
     start+=1
     if(start %step === 0 && str.length !== start) res +='-'

    
  
   }   
  //  output.slice(0,3)+'-'+output.slice(3,6)
    console.log("output", res)
}

console.log( strRan(11,'-',false,'alphanumspecial',formatStr))
//////////////////////////////////////////////////////////////////////////



////////////////////////////////Application of closure


function testClosure(){
  return ()=>{
    console.log("dfgyuiop Arrow",'this')
  }
}

function testClosure2(){
  //non arrow function is moe faster that arrow function
  return function(){
    /////////////////this point to global scope in both arrow and non arrorw
    console.log("dfgyuiop non-Arr",'this')
  }
}


console.time("1002")
testClosure()()
console.timeEnd("1002")


console.time("1002_")
testClosure2()()
console.timeEnd("1002_")



//////////////////////////////////////////////Module pattern
//// we have function the enclose it methosd and data with return object to expose the method and data to expose (which are public)
const Module   =(function(){
  let a  = "ANY"
  function privateMehod1(){

  }
  function privateMehod2(){
     
  }

  return {
     publicMethod: function(inp){
         console.log(inp+a)
     }
  }
})()
Module.publicMethod("CALL ")
////////////////////////////////////////////Module pattern
let _call=0
/////////////////////////////////////////Singleton pattern
function singleton(){
 if(_call > 0){
     _call++
     console.log("Already called")
 }else{
    console.log(  "call once")
     _call++
 }
 console.log(_call)
}

singleton()
singleton()
singleton()

function singleton2(func,context){
 let itHasRan = null;

 return function(){

     if(func){
      //   arguments  is a special key work like this
         itHasRan  = func.apply(context|| this, arguments )
         func = null; //any other call put it to null
     }

     return itHasRan
    
 }
}
let one_  =singleton2((a,b)=>console.log("asfdsadfsas",a,b))

one_(1,2)
one_(6,8)
one_(90,80)


/////////////////////////////////////////Singleton pattern

////////////////////////////////////memoize 

////////////////////////////////////memoize  through argument

function memoize(func) {
const cache = {};

return function(...args) {
 const key = JSON.stringify(args);

 if (cache[key]) {
   return cache[key];
 }

 const result = func.apply(this, args);
 cache[key] = result;

 return result;
};
}

// Example usage:

function fibonacci(n) {
if (n <= 1) {
 return n;
}

return fibonacci(n - 1) + fibonacci(n - 2);
}

const memoizedFibonacci = memoize(fibonacci);

console.time("10")
console.log(memoizedFibonacci(10)); // 55
console.timeEnd("10")

console.time("15")
console.log(memoizedFibonacci(14)); 
console.timeEnd("15")
// 610
console.time("102")
console.log(memoizedFibonacci(10)); // 55
console.timeEnd("102")


function caching(func,context){
  let cache  = {}

  return function(){
     if(cache[func.name]){
       return cache[func.name]
     }

     cache[func.name]  = func.apply(context||this,...arguments)
     console.log(cache)  // console.log(func.name)
  }

}
function longAct(){
    let store  = [];

  return store
}
let cach  = caching(longAct)
console.time("o")
cach()
console.timeEnd("o")

console.time("o1")
cach()
console.timeEnd("o1")

/// SCOPE  = VARIABLE OU HAVE ACCESS TO
//CLOSURE = FUNCTION INSIDE ANOTHER FUNCTION
//CURING  = FUNCTION THAT TAKE A VARIABLE AT A TIME AND RETURN FUNCTION THAT TAKE THE NEXT VARIABLE

/*
Debounce:

Debounce limits the execution of a function to occur only after a certain period of inactivity.
When an event is triggered, the debounce function sets a timer. If another event is triggered before the timer expires, 
the timer is reset. The function will only be executed once the timer completes and there is no subsequent event within the debounce interval.
Debounce is useful when you want to delay the execution of a function until after a series of events have occurred, such as when 
handling input events like keystrokes or search queries.
*/

function debounce(func, delay) {
  let timerId; 
  return function(...args) {
    clearTimeout(timerId);
    timerId = setTimeout(() => {
      func.apply(this, args);
    }, delay);
  };
}

// Example usage
function handleInput(event) {
  console.log("Input value:", event.target.value);
}

const debouncedHandleInput = debounce(handleInput, 300);

// Attach event listener to an input element
//document.getElementById("myInput").addEventListener("input", debouncedHandleInput);

/*


Throttle:

Throttle limits the frequency of function invocations by enforcing a maximum number of executions within a specific time interval.
When an event is triggered, the throttle function allows the function to be executed at most once within the defined time interval.
Subsequent events that occur within the throttle interval are ignored until the time interval elapses, at which point the function can be invoked again.
Throttle is useful when you want to limit the rate at which a function is executed, such as when handling scroll or resize events.*/

function throttle(func, interval) {
  let timerId;
  let shouldExecute = true;
  return function(...args) {
    if (!shouldExecute) return;
    shouldExecute = false;
    func.apply(this, args);
    timerId = setTimeout(() => {
      shouldExecute = true;
    }, interval);
  };
}

// Example usage
function handleScroll() {
  console.log("Scroll event");
}

//const throttledHandleScroll = throttle(handleScroll, 200);

// Attach event listener to the window scroll event
//window.addEventListener("scroll", throttledHandleScroll);

function compose(...funcs){

    return function(input,type){  //rtl =>right to left
      if(!type) throw new Error("Type is required type= compose|pipe")                                // ltr=>left to right
      let lenOffuncs = funcs.length-1;
       console.log(funcs);
     if(type ==='compose'){
      while (lenOffuncs > -1){
        let result  =  funcs[lenOffuncs](input) 
        input =  result;//output of one has become the input  of another function
        lenOffuncs--
       }
    
     return input;
     }else if(type==='pipe'){
      ///////this is pipe
       let start  = 0
      while ( start  <= lenOffuncs ){
        console.log(start, input);
        let result  =  funcs[lenOffuncs](input) 
        input =  result;//output of one has become the input  of another function
        start++ 
       }
    
     return input;
     }


       
    }


}

function one(x){///get category 
  return x*4  ///retun the array list of the category
}
function two(y){//get sub-category by using the cateogry list from get category
  return y+3 //// return the list of sub-category id
}

function three(z){//get item types by using sub-category-id list from get sub-category
  return z/2 //// return the list of items that has the the sub-category-id
}

let comp  = compose(two,one)
console.log(comp(5,'pipe'))

//////////////////////////////////////////////////redux issue
/*
 store.subscribe(function)
 store.subscribe is a method used to listen to changes in the state of the application. 
 It allows you to register a callback function that will be invoked whenever the state in the store is updated.

 store.dispach({}) this let state to change according to the type key in the object {key: remove}

 Call stack
 micro-stack
 task


Closure scope chain
Every closure has three scopes:

Local scope (Own scope)
Enclosing scope (can be block, function, or module scope)
Global scope

 const {
  ArrayPrototypeIndexOf,
  ArrayPrototypeJoin,
  ArrayPrototypePush,
  ArrayPrototypeShift,
  ArrayPrototypeSlice,
  Error,
  ErrorCaptureStackTrace,
  FunctionPrototypeBind,
  NumberIsNaN,
  ObjectAssign,
  ObjectIs,
  ObjectKeys,
  ObjectPrototypeIsPrototypeOf,
  ReflectApply,
  RegExpPrototypeExec,
  RegExpPrototypeSymbolReplace,
  SafeMap,
  String,
  StringPrototypeCharCodeAt,
  StringPrototypeIncludes,
  StringPrototypeIndexOf,
  StringPrototypeReplace,
  StringPrototypeSlice,
  StringPrototypeSplit,
  StringPrototypeStartsWith,
} = primordials;

*/