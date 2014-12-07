<?php
/**
  @author Krzysztof Ruszczyński <http://www.ruszczynski.eu>
 */
class KrscReports_Type_Excel_PHPExcel_Style_Borders_DashDotDotBorders extends KrscReports_Type_Excel_PHPExcel_Style_Borders
{
    protected function _getAllBorders()
    {
        $aOutput = array();
        $aOutput[static::KEY_STYLE] = PHPExcel_Style_Border::BORDER_DASHDOTDOT;
        $aOutput[static::KEY_COLOR] = self::_getColorArray( PHPExcel_Style_Color::COLOR_BLACK );
        return $aOutput;
    }
    
}