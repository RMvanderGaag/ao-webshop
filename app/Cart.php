<?php

namespace App;


class Cart
{
    //Wanneer de cart word aangemaakt worden deze properties aangemaakt
    public $items = null;
    public $totalQty = 0;
    public $totalPrice = 0;

    //Als er al een cart bestaat worden de gegevens van de oude cart in de nieuwe gezet
    public function __construct($oldCart){
        if($oldCart){
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }

    /**
     * Wanneer er een nieuw product in de shopping cart moet komen word deze functie aangesproken
     * @param mixed $item
     * @param int $id
     */
    public function add($item, $id){
        //Er word een array aangemaakt met het product erin
        $storedItem = ['qty' => 0, 'price' => $item->price, 'item' => $item];

        //Er word gekeken of dit item al bestaat 
        if($this->items) {
            if(array_key_exists($id, $this->items)){
                $storedItem = $this->items[$id];
            }
        }
        //De qty en de prijs word toegevoegd
        $storedItem['qty']++;
        $storedItem['price'] = $item->price * $storedItem['qty'];

        //De gegevens van de items, qty, en prijs worden veranderd
        $this->items[$id] = $storedItem;
        $this->totalQty++;
        $this->totalPrice += $item->price;
    }

    /**
     * Als de gebruiker een item uit het winkelmandje wilt verwijderen word deze functie uitgevoerd
     * @param int $id
     */
    public function removeOneItem($id){
        //De qty, prijs, totaalqty en totaalprijs worden verminderd
        $this->items[$id]['qty']--;
        $this->items[$id]['price'] -= $this->items[$id]['item']['price'];
        $this->totalQty--;
        $this->totalPrice -= $this->items[$id]['item']['price'];

        //Uiteindelijk word het item verwijderd
        if($this->items[$id]['qty'] <= 0){
            unset($this->items[$id]);
        }
    }

    /**
     * Als alle items van de zelfde soort verwijderd moeten worden word deze functie aangeroepn
     * @param int id
     */
    public function removeItem($id){
        //De totale hoeveelheid van dat product en de totale prijs worden verwijderd
        $this->totalQty -= $this->items[$id]['qty'];
        $this->totalPrice -= $this->items[$id]['price'];
        //Als laatst word het product zelf verwijderd
        unset($this->items[$id]);
    }

    /**
     * Als je gebruiker een bestelling heeft geplaats word alle inhoud van het winkelmandje verwijderd
     */
    public function destroy(){
        //De qty en de pijs van het totale winkelmandje word op 0 gezet
        $this->totalQty = 0;
        $this->totalPrice = 0;
        //Daarna word de gehele array 'items' verwijderd
        unset($this->items);
    }
}
