<html>
<head>
<title>Search Screen of Winestore</h4></title>
</head>

<body>
<div id="wrapper">
        <div id="header">
            <div id="banner">Search Screen of Winestore</div>
        </div>
        
    <div class="vgap"></div>
        
        <div id="body">
            <form action="result.php" method="get" id="searchForm" name="searchForm">
            <input type="hidden" id="flag" name="flag" />
            <table width="95%" border="0" cellspacing="0" cellpadding="0" align="center">
                <tr>
                    <td height="50" colspan="2"><h1>Searching</h1></td>
                </tr>
                <tr>
                    <td width="160" height="40" bgcolor="#f4f4f4"><strong>&nbsp;Wine Name</strong></td>
                    <td height="40" bgcolor="#f4f4f4">
                    <input type="text" name="winename" id="winename" class="txt" /></td>
                </tr>
                <tr>
                    <td width="160" height="40"><strong>&nbsp;Winery Name</strong></td>
                    <td height="40">
                    <input type="text" name="wineryname" id="wineryname" class="txt" /></td>
                </tr>
                <tr>
                    <td width="160" height="40" bgcolor="#F4F4F4"><strong>&nbsp;Region</strong></td>
                    <td height="40" bgcolor="#F4F4F4">
                    <select name="region" id="region">
                        <?php
                            while($row = mysql_fetch_row($regions)) {
                                echo "<option value=\"$row[0]\">$row[1]</option>\n";
                            }
                        ?>
                    </select></td>
                </tr>
                <tr>
                    <td width="160" height="40"><strong>&nbsp;Grape Variety</strong></td>
                    <td height="40">
                    <select name="grapeVariety" id="grapeVariety">
                        <option value="0" selected="selected">- Select value -</option>
                        <?php
                            while($row = mysql_fetch_row($varieties)) {
                                echo "<option value=\"$row[0]\">$row[1]</option>\n";
                            }
                        ?>
                    </select></td>
                </tr>
                <tr>
                    <td width="160" height="40" bgcolor="#F4F4F4"><strong>&nbsp;Range of Years</strong></td>
                    <td height="40" bgcolor="#F4F4F4">
                    <select name="yearFrom" id="yearFrom">
                        <option value="0" selected="selected">- Select value -</option>
                        <?php
                            for($i=0; $i<count($yearArray); $i++) {
                                echo "<option value=\"$yearArray[$i]\">$yearArray[$i]</option>\n";
                            }
                        ?>
                    </select>
                    -
                    <select name="yearTo" id="yearTo">
                        <option value="0" selected="selected">- Select value -</option>
                        <?php
                            for($i=0; $i<count($yearArray); $i++) {
                                echo "<option value=\"$yearArray[$i]\">$yearArray[$i]</option>\n";
                            }
                        ?>
                    </select>
                    </td>
                </tr>
                <tr>
                    <td width="160" height="40"><strong>&nbsp;Min Number in Stock</strong></td>
                    <td height="40"><input type="text" name="min_num_instock" id="min_num_instock" class="number" /></td>
                </tr>
                <tr>
                    <td width="160" height="40" bgcolor="#F4F4F4"><strong>&nbsp;Min Number Ordered</strong></td>
                    <td height="40" bgcolor="#F4F4F4"><input type="text" name="min_num_ordered" id="min_num_ordered" class="number" /></td>
                </tr>
                <tr>
                    <td height="40"><strong>&nbsp;Cost Range</strong></td>
                    <td height="40"><input type="text" name="min_cost" id="min_cost" class="number" />$ Min - <input type="text" name="max_cost" id="max_cost" class="number" />$ Max</td>
                </tr>
                <tr>
                    <td height="40" colspan="2" align="right" bgcolor="#F4F4F4"><input type="submit" name="btnSubmit" id="btnSubmit" value="Search" />
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="reset" name="btnRst" id="btnRst" value="Reset form" /></td>
                </tr>
            </table>
            </form>
        </div>
        
        <div class="vgap"></div>
        
        <div id="footer">
           
        </div>
    </div>
</body>

</html>
