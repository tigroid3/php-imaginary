# php-imaginary
SDK for https://github.com/h2non/imaginary

Basic usage:
------------
####Set service uri
```php
$client = new ImaginaryClient();
$client->setServiceUri('http://imaginary:9005');
```

Image processing
----------------
```php
$imaginaryResource = Imaginary::new()
    ->setUploadFilePath('/home/user/test.jpg')
    ->smartCrop(300, 300)
    ->zoom(2)
    ->convert(Imaginary::FORMAT_WEBP)
    ->execute();
        
//save new image        
file_put_contents('test.webp', $imaginaryResource->getContent());
//or 
move_uploaded_file($imaginaryResource->getPathProcessedFile(), 'test.webp');
```

Image info
--------------- 
```php
$imageInfo = Imaginary::new()
    ->setUploadFilePath('/home/user/tmp/test.jpg')
    ->info();
```
#####Example response
```php
Array
(
    [width] => 3840
    [height] => 2400
    [type] => jpeg
    [space] => srgb
    [hasAlpha] =>
    [hasProfile] =>
    [channels] => 3
    [orientation] => 0
)
```
