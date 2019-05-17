<?php
function save(iWorkData $obj, $key, $value)
{
    return $obj->saveData($key, $value);
}
function get(iWorkData $obj, $key)
{
    return $obj->getData($key);
}
function delete(iWorkData $obj, $key)
{
    return $obj->deleteData($key);
}
?>
