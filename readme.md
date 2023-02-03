# JsonDb

Simple file key/value database utility function. It stores key/value pairs into JSON file.
Clearly this not meant to be used for huge amounts of data. But it's
useful if you want to store settings data or anything large enough but with
acceptable read file speed. 
 

### Install

        Drop it somewhere.

### Usage

#### Add key/value:

    jsonDb(__DIR__.'/data.json', 'hello', 'world'); 
    jsonDb(__DIR__.'/data.json', 'alpha', 'beta'); 
        
#### Get value of key 'alpha':

	$value = jsonDb(__DIR__.'/data.json', 'alpha'); 

#### Get array container:

    $jsonArray = jsonDb();
     
### Licence
MIT
