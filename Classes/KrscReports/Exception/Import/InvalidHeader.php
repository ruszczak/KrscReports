<?php
/**
 * This file is part of KrscReports.
 *
 * Copyright (c) 2017 Krzysztof Ruszczyński
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
 * @package KrscReports
 * @copyright Copyright (c) 2017 Krzysztof Ruszczyński
 * @license http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt	LGPL
 * @version 1.1.0, 2017-04-13
 */

/**
 * Class for handling errors with invalid header in import.
 * 
 * @category KrscReports
 * @package KrscReports_Exception
 * @author Krzysztof Ruszczyński <http://www.ruszczynski.eu>
 */
class KrscReports_Exception_Import_InvalidHeader extends KrscReports_Exception
{

        /**
         * Method setting exception message.
         * @param string $sExpectedColumnName expected column name
         * @param string $sActualColumnName column name in excel file
         * @return KrscReports_Exception_Import_InvalidHeader object, on which this method was executed
         */
        public function setMessage( $sExpectedColumnName, $sActualColumnName )
        {
            $this->message = sprintf( 'Header in imported file is invalid (expected: "%s", actual: "%s")', $sExpectedColumnName, $sActualColumnName );
            return $this;
        }
}