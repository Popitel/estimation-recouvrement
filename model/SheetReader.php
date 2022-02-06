<?php
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;

class SheetReader 
{
	public $csv_name;

	public function setCSVName($name)
	{
		$this->csv_name = "./public/excels/" . $name;
	}
	
	public function getSampleNb()
	{
		$reader = IOFactory::createReaderForFile($this->csv_name);
		$reader->setReadDataOnly(true);
		$sprSheet = IOFactory::load($this->csv_name);
		$act_sheet = $sprSheet->getActiveSheet();
		$row = 1;
		$col = 1;
		$cell = $act_sheet->getCellByColumnAndRow($col, $row);
		$value = $cell->getValue();
		while(strlen($value) > 0)
		{
			$row += 1;
			$cell = $act_sheet->getCellByColumnAndRow($col, $row);
			$value = $cell->getValue();
		}
		$sampleNb = $row-2;
		return $sampleNb;
	}
	
	public function getQuadratNb()
	{
		$reader = IOFactory::createReaderForFile($this->csv_name);
		$reader->setReadDataOnly(true);
		$sprSheet = IOFactory::load($this->csv_name);
		$act_sheet = $sprSheet->getActiveSheet();
		$row = 1;
		$col = 1;
		$cell = $act_sheet->getCellByColumnAndRow($col, $row);
		$value = $cell->getValue();
		while(strlen($value) > 0)
		{
			$col += 1;
			$cell = $act_sheet->getCellByColumnAndRow($col, $row);
			$value = $cell->getValue();
		}
		$quadratNb = $col-2;
		return $quadratNb;
	}

	public function areCountersCorrect()
	{
		$input = new Input;
		$model = new Model();
		$this->setCSVName($input->green_sheet_name);
		$green_sampleNb = $this->getSampleNb();
		$green_counter = $model->getGreenCounter();
		$this->setCSVName($input->red_sheet_name);
		$red_sampleNb = $this->getSampleNb();
		$red_counter = $model->getRedCounter();

		return ($green_counter <= $green_sampleNb) && ($red_counter <= $red_sampleNb);
	}

	public function getNamesOfSample($sampleNb)
	{
		$row = $sampleNb+1;
		$reader = IOFactory::createReaderForFile($this->csv_name);
		$reader->setReadDataOnly(true);
		$sprSheet = IOFactory::load($this->csv_name);
		$act_sheet = $sprSheet->getActiveSheet();
		$col = 2;
		$names = array();
		$cell = $act_sheet->getCellByColumnAndRow($col, $row);
		$val = $cell->getValue();
		while(strlen($val) > 0)
		{
			$cell = $act_sheet->getCellByColumnAndRow($col, $row);
			$val = $cell->getValue();
			$names[] = $val;
			$col += 1;
		}
		array_pop($names);

		return $names;
	}

	public function getGreenAndRedNamesOfSample($sampleNb)
	{
		$input = new Input;
		$this->setCSVName($input->green_sheet_name);
		$names = $this->getNamesOfSample($sampleNb);
		$this->setCSVName($input->red_sheet_name);
		$names = array_merge($names, $this->getNamesOfSample($sampleNb));

		return $names;
	}

	public function increaseCounters()
	{
		$this->increaseGreenCounter();
		$this->increaseRedCounter();
	}

	public function increaseGreenCounter()
	{
		$input = new Input;
		$this->setCSVName($input->green_sheet_name);
		$model = new Model;
		$count = $model->getGreenCounter();
		$sampleNb = $this->getSampleNb();
		if($count < $sampleNb)
		{
			$model->setGreenCounter($count+1);
		}
		else
		{
			$model->setGreenCounter(1);
		}
	}

	public function increaseRedCounter()
	{
		$input = new Input;
		$this->setCSVName($input->red_sheet_name);
		$model = new Model;
		$count = $model->getRedCounter();
		$sampleNb = $this->getSampleNb();
		if($count < $sampleNb)
		{
			$model->setRedCounter($count+1);
		}
		else
		{
			$model->setRedCounter(1);
		}
	}

	public function getNextSerie()
	{
		$model = new Model;
		$input = new Input;
		$names = array();
		if($this->areCountersCorrect())
		{
			$this->setCSVName($input->green_sheet_name);
			$names = $this->getNamesOfSample($model->getGreenCounter());
			$this->setCSVName($input->red_sheet_name);
			$names = array_merge($names, $this->getNamesOfSample($model->getRedCounter()));
		}
		return $names;
	}
	
	public function getGreenNumber()
	{
		$input = new Input;
		$model = new Model;
		$this->setCSVName($input->green_sheet_name);
		$names = $this->getNamesOfSample($model->getGreenCounter());
		return count($names);
	}
}
