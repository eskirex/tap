# tap
Tap: Type-Assert-Php-Object


## Type less, code better

Instead of checking every input variable if it was set:

Old style:
```
if ( ! isset ($_POST["someData"]))
    throw new ValidationException ("Something went wrong")

$data = $_POST["someData"]
if ( ! preg_match ("/somePreg/", $data))
    throw new ValidationException ("And another ting");

$object->someKey = $data;

..next dataset..
```

TAP Style:

```
beamMap($_POST)
    ->use("someData")->reqNotNull()->reqPregMatch("/somePreg/")->beam($someObj->someData)
    ->use("nextData")->reqPregMatch("/SomeOtherPreg/")->beam($someObj->someData)
```