<?php
/**
 * Copyright (c) 2009 Arne Blankerts <arne@blankerts.de>
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without modification,
 * are permitted provided that the following conditions are met:
 *
 *   * Redistributions of source code must retain the above copyright notice,
 *     this list of conditions and the following disclaimer.
 *
 *   * Redistributions in binary form must reproduce the above copyright notice,
 *     this list of conditions and the following disclaimer in the documentation
 *     and/or other materials provided with the distribution.
 *
 *   * Neither the name of Stefan Priebsch nor the names of contributors
 *     may be used to endorse or promote products derived from this software
 *     without specific prior written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS"
 * AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT  * NOT LIMITED TO,
 * THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR
 * PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER ORCONTRIBUTORS
 * BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY,
 * OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF
 * SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS
 * INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN
 * CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE)
 * ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 *
 * @package    Scanner
 * @author     Arne Blankerts <arne@blankerts.de>
 * @copyright  Arne Blankerts <arne@blankerts.de>, All rights reserved.
 * @license    BSD License
 */

namespace TheSeer\Tools\FileSystem {

   class Scanner {

      protected $include = array();

      protected $exclude = array();

      public function __construct() {
      }

      public function addInclude($inc) {
         $this->include[] = $inc;
      }

      public function getIncludes() {
         return $this->includes;
      }

      public function clearIncludes() {
         $this->includes = array();
      }

      public function addExclude($exc) {
         $this->exclude[] = $exc;
      }

      public function getExcludes() {
         return $this->excludes;
      }

      public function clearExcludes() {
         $this->excludes = array();
      }

      public function getFiles($path) {
         $res = array();
         foreach($this->__invoke($path) as $entry) {
            $res[] = $entry;
         }
         return $res;
      }

      public function __invoke($path) {
         if (!file_exists($path)) {
            throw new ScannerException("Path '$path' does not exist.", ScannerException::NotFound);
         }
         $filter = new IncludeExcludeFilter(new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($path)));
         $filter->setInclude( count($this->include) ? $this->include : array('*'));
         $filter->setExclude($this->exclude);
         return $filter;
      }

   }

   class ScannerException extends \Exception {
      const NotFound = 1;
   }

}