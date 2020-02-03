<?php
use KrscReports\Import\ReaderTrait;

/**
 * This file is part of KrscReports.
 *
 * Copyright (c) 2020 Krzysztof Ruszczyński
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the termls of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA
 *
 * @category KrscReports
 * @package KrscReports_Report
 * @copyright Copyright (c) 2020 Krzysztof Ruszczyński
 * @license http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt	LGPL
 * @version 2.0.6, 2020-02-02
 */

/**
 * Example report creating three tables in one worksheet (one after the other, done automatically) with advanced styling in PHPExcel.
 * For some columns below last row there is a sum formula. 
 * 
 * @category KrscReports
 * @package KrscReports_Report
 * @author Krzysztof Ruszczyński <http://www.ruszczynski.eu>
 */
class KrscReports_Report_ExampleReportTableWithSums extends KrscReports_Report_ExampleReport
{
    /**
     * Method returns description of generated by that object worksheet.
     * @return string description of report
     */
    public function getDescription()
    {
        return 'Report with three tables in one worksheet (one after the other, with customized distance between them) with advanced styling. For some columns below last row there is a sum formula.';
    }
    
    /**
     * Method responsible for creating PHPExcel object with generated report.
     * @return void
     */
    public function generate()
    {
        KrscReports_Builder_Excel::setExcelObject();
        $oCell = ReaderTrait::getCellObject();
        KrscReports_Builder_Excel::setDocumentProperties();

        // setting styles - adding elements to iterator 
        $oCollectionDefault = new KrscReports_Type_Excel_PHPExcel_Style_Iterator_Collection();
        $oCollectionDefault->addStyleElement( new KrscReports_Type_Excel_PHPExcel_Style_Borders_ExampleBorders() );
        
        $oCollectionRow = new KrscReports_Type_Excel_PHPExcel_Style_Iterator_Collection();
        $oCollectionRow->addStyleElement( new KrscReports_Type_Excel_PHPExcel_Style_Fill_Basic() );
        $oCollectionRow->addStyleElement( new KrscReports_Type_Excel_PHPExcel_Style_Borders_DashDotDotBorders() );
        
        $oFill = new KrscReports_Type_Excel_PHPExcel_Style_Fill_Basic();
        $oFill->setColor( KrscReports_Type_Excel_PHPExcel_Style_Default::COLOR_GRAY );
        $oCollectionSummary = new KrscReports_Type_Excel_PHPExcel_Style_Iterator_Collection();
        $oCollectionSummary->addStyleElement( $oFill );
        $oCollectionSummary->addStyleElement( new KrscReports_Type_Excel_PHPExcel_Style_Borders_DashDotDotBorders() );
        
        
        $oStyle = new KrscReports_Type_Excel_PHPExcel_Style();
        $oStyle->setStyleCollection( $oCollectionDefault );
        $oStyle->setStyleCollection( $oCollectionRow, KrscReports_Document_Element_Table::STYLE_ROW );
        $oStyle->setStyleCollection( $oCollectionSummary, KrscReports_Document_Element_Table::STYLE_SUMMARY );

        $oCell->setStyleObject( $oStyle );

        $oBuilder = new KrscReports_Builder_Excel_PHPExcel_TableWithSums();
        $oBuilder->setCellObject( $oCell );
        $oBuilder->setData( array( array( 'First column' => '1', 'Second column' => '2' ), array( 'First column' => '3', 'Second column' => '4' ) ) );
        $oBuilder->addColumnToSum( 'Second column' );
        
        // creation of element responsible for creating table
        $oElementTable = new KrscReports_Document_Element_Table();
        $oElementTable->setBuilder( $oBuilder );
        
        $oBuilder2 = new KrscReports_Builder_Excel_PHPExcel_TableWithSums();
        $oBuilder2->setCellObject( $oCell );
        $oBuilder2->setData( array( array( 'I column' => '5', 'II column' => '6' ), array( 'I column' => '7', 'II column' => '8' ), array( 'I column' => '-1', 'II column' => '4' ) ) );
        $oBuilder2->addColumnToSum( 'I column' );
        $oBuilder2->addColumnToSum( 'II column' );
        
        $oElementTable2 = new KrscReports_Document_Element_Table();
        $oElementTable2->setBuilder( $oBuilder2 );
        $oElementTable2->setLinesBetweenElements(1);
        
        $oBuilder3 = new KrscReports_Builder_Excel_PHPExcel_TableWithSums();
        $oBuilder3->setCellObject( $oCell );
        $oBuilder3->setData( array( array( 'I column' => '5', 'II column' => '6' ), array( 'I column' => '7', 'II column' => '8' ) ) );
        $oBuilder3->addColumnToSum( 'I column' );
        
        $oElementTable3 = new KrscReports_Document_Element_Table();
        $oElementTable3->setBuilder( $oBuilder3 );
        $oElementTable3->setLinesBetweenElements(3);
        
        // adding table to spreadsheet
        $oElement = new KrscReports_Document_Element();
        $oElement->addElement( $oElementTable );
        $oElement->addElement( $oElementTable2 );
        $oElement->addElement( $oElementTable3 );
        
                
        $oElement->beforeConstructDocument();
        $oElement->constructDocument();
        $oElement->afterConstructDocument();
            
    }
}
