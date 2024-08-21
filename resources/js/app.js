import './bootstrap';


//jqueryModule loader
//npm install jquery
import jQuery from 'jquery';
window.$ = window.jQuery =jQuery;

import { Modal } from 'bootstrap';

//Sweetalert2 loader
//npm install swetalert2
import Swal from 'sweetalert2';
window.Swal = Swal

import DataTable from 'datatables.net-bs5';
window.DataTable = DataTable;

import select2 from 'select2';
select2();