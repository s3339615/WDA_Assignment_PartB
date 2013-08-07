<html>

<head>
<title>Search Screen of Winestore</title>
</head>

<?php
	require_once('database.php');
	if(!$dbconn = mysql_connect(DB_HOST, DB_USER, DB_PW))
	{
		echo 'Could not connect to mysql on ' . DB_HOST . '\n';
		exit;
	}
	
	echo 'Connected to mysql <br />';
	
	if(!mysql_select_db(DB_NAME, $dbconn)) 
	{
		echo 'Could not user database ' . DB_NAME . '\n';
		echo mysql_error() . '\n';
		exit;
	}
	
	echo 'Connected to database ' . DB_NAME . '\n';
	
	/*query for get the regions from database*/
    $query = 'SELECT * FROM region ORDER BY region_name';//Get all regions
    $regions = mysql_query($query, $dbconn);
	
    /*query for get the grape varities from database*/
    $query = 'SELECT * FROM grape_variety ORDER BY variety';
    $varieties = mysql_query($query, $dbconn);
	
    /*query for get the years from database*/
    $yearArray = array();
    $query = 'SELECT DISTINCT year FROM wine ORDER BY year';
    $years = mysql_query($query, $dbconn);
    $x = 0;
    while($row = mysql_fetch_row($years)) 
	{
        $yearArray[$x] = $row[0];
        $x++;
    }
?>

<body>

<div>
        <div id="header">
            <div id="banner"><I><h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Search Screen of Winestore</h3></I></div>
        </div>
        
    <div class="vgap"></div>
        
        <div id="body">
			<!-- GET method for search_result.php -->
            <form action="search_result.php" method="get" id="searchForm" name="searchForm">
            <input type="hidden" id="flag" name="flag" />
			
            <table width="95%" border="0" cellspacing="0" cellpadding="0" align="center">
				<!-- Table Row 1 -->
                <tr>
                    <td width="160" height="40" bgcolor="#CED8F6"><strong>&nbsp;Wine Name</strong></td>
                    <td height="40" bgcolor="#CED8F6">
                    <input type="text" name="winename" id="winename" class="txt" /></td>
                </tr>
				<!-- Table Row 2 -->
                <tr>
                    <td width="160" height="40"><strong>&nbsp;Winery Name</strong></td>
                    <td height="40">
                    <input type="text" name="wineryname" id="wineryname" class="txt" /></td>
                </tr>
				<!-- Table Row 3 -->
                <tr>
                    <td width="160" height="40" bgcolor="#CED8F6"><strong>&nbsp;Region</strong></td>
                    <td height="40" bgcolor="#CED8F6">
                    <select name="region" id="region">
						<option value="0" selected="selected">- Select Region -</option>
                        <?php
                            while($row = mysql_fetch_row($regions)) 
							{
                                echo "<option value=\"$row[0]\">$row[1]</option>\n";
                            }
                        ?>
                    </select></td>
                </tr>
				<!-- Table Row 4 -->
                <tr>
                    <td width="160" height="40"><strong>&nbsp;Grape Variety</strong></td>
                    <td height="40">
                    <select name="grapeVariety" id="grapeVariety">
                        <option value="0" selected="selected">- Select value -</option>
                        <?php
                            while($row = mysql_fetch_row($varieties)) 
							{
                                echo "<option value=\"$row[0]\">$row[1]</option>\n";
                            }
                        ?>
                    </select></td>
                </tr>
				<!-- Table Row 5 -->
                <tr>
                    <td width="160" height="40" bgcolor="#CED8F6"><strong>&nbsp;Range of Years</strong></td>
                    <td height="40" bgcolor="#CED8F6">
					From
                    <select name="yearFrom" id="yearFrom">
                        <option value="0" selected="selected">- Select value -</option>
                        <?php
                            for($i=0; $i<count($yearArray); $i++) 
							{
                                echo "<option value=\"$yearArray[$i]\">$yearArray[$i]</option>\n";
                            }
                        ?>
                    </select>
                    to
                    <select name="yearTo" id="yearTo">
                        <option value="0" selected="selected">- Select value -</option>
                        <?php
                            for($i=0; $i<count($yearArray); $i++) 
							{
                                echo "<option value=\"$yearArray[$i]\">$yearArray[$i]</option>\n";
                            }
                        ?>
                    </select>
                    </td>
                </tr>
				<!-- Table Row 6 -->
                <tr>
                    <td width="160" height="40"><strong>&nbsp;Min Number in Stock</strong></td>
                    <td height="40"><input type="text" name="min_num_instock" id="min_num_instock" class="number" /></td>
                </tr>
				<!-- Table Row 7 -->
                <tr>
                    <td width="160" height="40" bgcolor="#CED8F6"><strong>&nbsp;Min Number Ordered</strong></td>
                    <td height="40" bgcolor="#CED8F6"><input type="text" name="min_num_ordered" id="min_num_ordered" class="number" /></td>
                </tr>
				<!-- Table Row 8 -->
                <tr>
                    <td height="40"><strong>&nbsp;Cost Range</strong></td>
                    <td height="40"> (MIN)$<input type="text" name="min_cost" id="min_cost" class="number" /> (MAX)$<input type="text" name="max_cost" id="max_cost" class="number" /></td>
                </tr>
				<!-- Table Row 9 "Button" -->
                <tr>
                    <td height="40" colspan="2" align="right" bgcolor="#CED8F6"><input type="submit" name="btnSubmit" id="btnSubmit" value="Search" />
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="reset" name="btnRst" id="btnRst" value="Reset form" /></td>
                </tr>
            </table>
            </form>
        </div>
        
        <div class="vgap"></div>
        
        <div id="footer">
            &copy; Ye SHEN s3339615
        </div>
    </div>
</body>




</html>
