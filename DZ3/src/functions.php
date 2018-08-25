<?php

function dataXML($file = './data.xml')
{
    $data = file_get_contents($file);
    $xml = new SimpleXMLElement($data);
    $result ='<div><p>
            <span>PurchaseOrderNumber: </span>
            <span>' . $xml['PurchaseOrderNumber'] . "</span></p>
            <p><span>OrderDate: </span>
            <span>" . $xml['OrderDate']  . "</span></p></div>";
    $result.='<table border="1"><thead><tr>
        <td>Type</td>
        <td>Name</td>
        <td>Street</td>
        <td>City</td>
        <td>State</td>
        <td>Zip</td>
        <td>Country</td>
        </tr>
        </thead>
        <tbody>';

    foreach ($xml -> Address as $add) {
        $result.="<tr><td>{$add['Type']}</td>
                    <td>".$add->Name . "</td>
                    <td>{$add -> Street}</td>
                    <td>{$add -> City}</td>
                    <td>{$add ->State}</td>
                    <td>{$add -> Zip}</td>
                    <td>{$add -> Country}</td></tr>";
    }
    $result.='</tbody>';
    $result.="<p>
            <span>DeliveryNotes: </span>
            <span>" . $xml->DeliveryNotes . "</span></p>";
    $result.='<br><table border="1"><thead><tr>
        <td>PartNumber</td>
        <td>ProductName</td>
        <td>Quantity</td>
        <td>USPrice</td>
        <td>Comment</td>
        <td>ShipDate</td>
        </tr>
        </thead>
        <tbody>';

    foreach ($xml -> Items ->Item as $prod) {
        $result.="<tr><td>{$prod['PartNumber']}</td>
                    <td>".$prod->ProductName . "</td>
                    <td>{$prod -> Quantity}</td>
                    <td>{$prod -> USPrice}</td>
                    <td>{$prod ->Comment}</td>
                    <td>{$prod -> ShipDate}</td>
                    </tr>";
    }
    $result.='</tbody><br><br>';

    echo $result;
}

function task2()
{
    $mas = [
        ["1","2","3"],
        ["4","5","6"],
        ["7","8","9"],
    ];
    file_put_contents("output.json", json_encode($mas));
    if(($rand = rand(1,10)) > 4) {
        $newMas = json_decode(file_get_contents("output.json"), true);
        $newMas[]=[$rand];
        $newMas = json_encode($newMas);
        file_put_contents("output2.json", $newMas);
    } else {
        file_put_contents("output2.json", json_encode($mas));
    }
    $arr1=json_decode(file_get_contents("output.json"));
    $arr2=json_decode(file_get_contents("output2.json"));
    $diff = array_diff_assoc($arr2, $arr1);
    if($diff){
        echo "Расхождение массивов: <br><pre>";
        print_r($diff);
        echo "</pre>";
    } else {
        echo "Массивы одинаковы";
    }
}

function task3($quantity = 50)
{
    $mas = [];
    for ($i=0; $i<$quantity; $i++) {
        $rand = rand(1, 100);
        $mas[] = $rand;
    }
    $fp = fopen('./file.csv' , 'w');
    fputcsv($fp, $mas);
    fclose($fp);
    $openCSV = fopen('./file.csv', 'r');
    if ($openCSV) {
        $res = [];
        $sum = 0;
        while(($data = fgetcsv($openCSV,1000, ',')) !== false){
            $res[] = $data;
            //  print_r ($data); echo "<hr>";

            foreach ($res as $re => $value) {
                foreach ($value as $revalue => $valueVal) {
                    if ($valueVal%2 == 0) {
                        $sum+=$valueVal;
                    }
                }
            }

        }
    }

    echo "Cумма четных чисел равна: "; print_r($sum);
}

function task4(){
    $data = file_get_contents('https://en.wikipedia.org/w/api.php?action=query&titles=Main%20Page&prop=revisions&rvprop=content&format=json');
    if ($data===false) {
        print "Файд не найден";
    } else {
        $res = json_decode($data, ASSOC);
        echo "title: " . $res['query']['pages']['15580374']['title'] . "<br>";
        echo "pageid: " . $res['query']['pages']['15580374']['pageid'];
    }
}