<?php
/**
 * This file is part of KrscReports.
 *
 * Copyright (c) 2014 Krzysztof Ruszczyński
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
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
 * @package KrscReports_Type
 * @copyright Copyright (c) 2014 Krzysztof Ruszczyński
 * @license http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt	LGPL
 * @version 1.0.0, 2014-12-28
 */

/**
 * Default class for elements responsible for style of cell. All such classes 
 * should inherit from this one.
 * 
 * @category KrscReports
 * @package KrscReports_Type
 * @author Krzysztof Ruszczyński <http://www.ruszczynski.eu>
 */
abstract class KrscReports_Type_Excel_PHPExcel_Style_Default
{
    /**
     * key for element, which is created by this object
     */
    const ARRAY_KEY = '';    
    
    /**
     * key for array element specifying color
     */
    const KEY_COLOR_RGB = 'rgb';
    
    /**
     * Method creating array with style properties to be implemented to PHPExcel cell.
     * @return array style properties to be implemented on cell
     */
    abstract public function getStyleArray();
    
    /**
     * Method returning key, on which current object generated properties will be written to PHPExcel cell.
     * @return string
     */
    public function getArrayKey()
    {
        return static::ARRAY_KEY;
    }
    
    /**
     * Method attaching new subarray.
     * @param array $aOutput current array, to which subarray will be added
     * @param string $sKey key on which subarray will be added
     * @param array $aStyle content of added subarray
     * @return array array with attached subarray
     */
    protected static function _attachToArray( $aOutput, $sKey, $aStyle )
    {
        if( !empty( $aStyle ) )
        {
            $aOutput[$sKey] = $aStyle;
        }
        
        return $aOutput;
    }
    
    /**
     * Method returning array associated with color (to be used in many places associated with color in styles).
     * @param string $sColor color (in rgb notation) to be returned in array
     * @return array style array with specified color
     */
    protected static function _getColorArray( $sColor )
    {
        return array( self::KEY_COLOR_RGB => $sColor );
    }
}
