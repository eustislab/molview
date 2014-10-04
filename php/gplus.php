<?php
/**
 * This file is part of MolView (https://molview.org)
 * Copyright (c) 2014, Herman Bergwerf
 *
 * MolView is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * MolView is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with MolView.  If not, see <http://www.gnu.org/licenses/>.
 */

header('content-type: application/json');

parse_str($_SERVER["QUERY_STRING"]);

libxml_use_internal_errors(true);

$html =  file_get_contents("https://plusone.google.com/_/+1/fastbutton?url=".urlencode($url));
$doc = new DOMDocument();
$doc -> loadHTML($html);
$counter = $doc -> getElementById('aggregateCount');
echo '{ "count": '.$counter -> nodeValue."}";

libxml_clear_errors();
