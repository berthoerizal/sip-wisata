<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title ?></title>
</head>

<body>
    <h1><?php echo $title ?></h1>
    <div class="col-md-12">
        <label for="x1">X1</label>
        <input type="number" name="x1" id="x1" placeholder="" value=""><br>
        <label for="x1">X2</label>
        <input type="number" name="x2" id="x2" placeholder="" value=""><br>
        <label for="x1">X3</label>
        <input type="number" name="total" id="x3" placeholder="" value=""><br>

        <button class="btn btn-info notika-btn-info" onclick="tambah()"><b>Tambah</b></button>
    </div>
    <hr>
    <div class="col-md-12">
        <label for="lr">Learning Rate</label><br>
        <input type="number" name="lr" id="lr" placeholder="" value=""><br>
        <label for="maks_epoch">Maksimal Epoch</label><br>
        <input type="number" name="maks_epoch" id="maks_epoch" placeholder="" value=""><br>
        <label for="min_error">Minimal Error</label><br>
        <input type="number" name="min_error" id="min_error" placeholder="" value=""><br>
        <label for="neuron_hidden">Jumlah Neuron Hidden Layer</label><br>
        <input type="number" name="neuron_hidden" id="neuron_hidden" placeholder="" value=""><br>
    </div>

</body>
<script>
    var x1 = document.getElementById("x1");
    var x2 = document.getElementById("x2");
    var x3 = document.getElementById('x3');
    var lr = document.getElementById('lr');
    var maks_epoch = document.getElementById('maks_epoch');
    var min_error = document.getElementById('min_error');
    var neuron_hidden = document.getElementById('neuron_hidden');
    var neuron_input = 3;

    function normalisasi() {
        x3.value = parseFloat(x1.value) + parseFloat(x2.value);
    }
</script>

</html>