<?php

/**
 *  a class represents functionality of another class
 * we a class  (object)
 * we a representer (objetct proxy)  
 * we use proxy to get the image to avoid re-creation
 */
// Subject interface
interface Image
{
    public function display();
}

// RealSubject
class RealImage implements Image
{
    private $filename;

    public function __construct($filename)
    {
        $this->filename = $filename;
        $this->loadFromDisk();
    }

    public function display()
    {
        return "Displaying image {$this->filename}\n";
    }

    private function loadFromDisk()
    {
        echo "Loading image {$this->filename} from disk\n";
    }
}
/*               ========= Implement  interface
  containerClass 
                ========== compose another that implement the interface 

*/
// Proxy
class ProxyImage implements Image
{
    private $filename;
    private $realImage;

    public function __construct($filename)
    {
        $this->filename = $filename;
    }

    public function display()
    {
        if ($this->realImage == null) {
            $this->realImage = new RealImage($this->filename);
        }
        return $this->realImage->display();
    }
}

// Client code
$image1 = new ProxyImage("image1.jpg");
echo $image1->display(); // The RealImage is loaded from disk

$image2 = new ProxyImage("image2.jpg");
echo $image2->display(); // The RealImage is loaded from disk

// The RealImage is not loaded from disk, as it was already loaded by the Proxy
echo $image1->display();

/*
 In this example, the Image interface is the Subject interface that defines the display() method. The RealImage class is a RealSubject class that implements the Image interface and provides the real functionality of displaying an image. The ProxyImage class is a Proxy class that also implements the Image interface, and provides a surrogate for the RealImage class. The ProxyImage class controls access to the RealImage class by creating a new instance of RealImage only when necessary, and returning the cached instance otherwise.

The client code creates an instance of the ProxyImage class with a filename, and then calls its display() method. If the RealImage object has not yet been loaded, the ProxyImage class creates a new instance of RealImage with the given filename and stores it. If the RealImage object has already been loaded, the ProxyImage class returns the cached instance. This allows the client code to display the image without having to know whether the RealImage object has already been loaded or not.

Overall, the Proxy pattern is useful when you want to control access to a resource, such as a file, network connection, or large object, or when you want to add functionality to an object without changing its interface.*/


$arr = [20, 30, 40, 2, 4, 4];
$arr2  =  $arr;

$a  = array_splice($arr, 0, 4);

var_dump($a, $arr2, $arr);
