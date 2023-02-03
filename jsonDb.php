<?php

function jsonDb($fileName, $key=null, $value=null) 
{		
	if (!$key) //return db
	{
		if (file_exists($fileName))
		{
			$jsonData = file_get_contents($fileName);
			try 
			{
				$jsonDecodedData = json_decode($jsonData, $associative=true, $depth=512, JSON_THROW_ON_ERROR);
			} 
			catch (Exception $e) 
			{
				error_log("jsonDb: " . $e);
				return null;
			}
			
			if (!is_array($jsonDecodedData))
			{
				error_log('jsonDb: Data container must be associative array!');
				return null;
			}
			
			return $jsonDecodedData;
		}
		else
		{
			error_log('jsonDb: File not found!');
			return null;
		}
	}
	
    if (!$value) //read
    {
		if (file_exists($fileName))
		{
			$jsonData = file_get_contents($fileName);
			try 
			{
				$jsonDecodedData = json_decode($jsonData, $associative=true, $depth=512, JSON_THROW_ON_ERROR);
			} 
			catch (Exception $e) 
			{
				error_log("jsonDb: " . $e);
				return null;
			}
			
			if (!is_array($jsonDecodedData))
			{
				error_log('jsonDb: Data container must be associative array!');
				return null;
			}
			
			return $jsonDecodedData[$key];
		}
		else
		{
			error_log('jsonDb: File not found!');
			return null;
		}
	}
	else //write
	{
		
		if (file_exists($fileName))
		{
			$jsonData = file_get_contents($fileName);
			try 
			{
				$jsonDecodedData = json_decode($jsonData, $associative=true, $depth=512, JSON_THROW_ON_ERROR);
			} 
			catch (Exception $e) 
			{
				error_log("jsonDb: " . $e);
				return null;
			}
			
			if (!is_array($jsonDecodedData))
			{
				error_log('jsonDb: Data container must be associative array!');
				return null;
			}
			
			$jsonDecodedData[$key] = $value;
			$newJsonData = json_encode($jsonDecodedData);
			return file_put_contents($fileName, $newJsonData);
		}
		else
		{
			$jsonDecodedData[$key] = $value;
			$newJsonData = json_encode($jsonDecodedData);
			return file_put_contents($fileName, $newJsonData);
		}
	}
}
