<?php
$conn = new mysqli("sql.freedb.tech", "freedb_tanviranindo", "@TptfEUW$4UgwE9", "freedb_mechaniclagbe");
$sql = "INSERT INTO `client` VALUES (8, 'REZWANA', 'RAHMAN', 'tonu@gmail.com', '01919454545', 'asd', 2);";
if ($conn->query($sql)) {
    echo "Value inserted";
} else {
    echo "Failed";
}
$conn->close();
