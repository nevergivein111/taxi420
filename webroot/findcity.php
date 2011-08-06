
    <?php $country=$_GET['country'];
    $link = mysql_connect('localhost', 'root', 'tiptop'); 
    if (!$link) {
      die('Could not connect: ' . mysql_error());
    }
    mysql_select_db('ajax'); //change this if required
    $query="select city from city where countryid=$country";
    $result=mysql_query($query);?>
    <select name="city">
    <option>Select City</option>
    <?php while($row=mysql_fetch_array($result)) { ?>
       <option value="0"><?php echo $row['city']; ?></option>
    <?php } ?>
    </select>

