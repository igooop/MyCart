<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$ItemName = array('Doghy', 'Catty' , 'Doge');
    	$Itempic = array('http://definitelyfilipino.com/blog/wp-content/cache/thumbnails/2011/11/Khloe-Kardashian-Boo-the-Dog-Facebook-102610261_large-678x381-c.jpg', 'https://www.petfinder.com/wp-content/uploads/2012/11/91615172-find-a-lump-on-cats-skin-632x475.jpg', 'https://ih0.redbubble.net/image.129280177.0023/flat,800x800,075,f.u1.jpg');
    	$price = array('150', '200','250');
    	
    	$i=0;
    	while ($i < 3) {
   		DB::table('products')->insert([
        	'ItemName' => $ItemName[$i] ,
        	'Itempic' => $Itempic[$i] ,
        	'price' => $price[$i],
        	'productId' => str_random(5)
        	
        ]);
     $i ++;   
    }
   }
}
