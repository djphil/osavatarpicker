<section>
<h1><?php echo $osavatarpicker; ?> <span class="pull-right">Search</span></h1>

<?php
if (isset($_POST['search']))
{
    if (!empty($_POST['searchword']))
    {
        $search_word  = htmlspecialchars($_POST['searchword']);
        $query = ('
            SELECT * 
            FROM '.$tbname.' 
            WHERE folderName LIKE ?
        ');
        $query = $db->prepare($query);
        $value = "%{$search_word}%";
        $query->bindValue(1, $value, PDO::PARAM_STR);        
        $query->execute();

        $row = $query->rowCount() != 0;

        echo "<h2>Search result(s):</h2>\n";

        if ($row)
        {
            $counter = 0;

            while ($result = $query->fetch()) 
            {
                ++$counter;
                $folderName = $result['folderName'];
            }

            echo "\n<p><span class='badge'>".$counter."</span> Avatar found with name: <strong>".$folderName."</strong></p>\n";
            echo '<div class="col-md-3">';
            echo "<h3>Avatar Image:</h3>\n";
            echo '<img class="img-thumbnail" src="img/'.$folderName.'.jpg" alt="'.$folderName.'" title="'.$folderName.'" >';
            echo '</div>';
        }

        else 
        {
            echo 'Nothing found';
        }
    }
    else echo '<p class="alert alert-danger alert-anim">Please enter a search query</p>';
}
else echo '<p class="alert alert-info">Please enter a search query</p>';

unset($folderName);
$query = null;
?>
</section>
