import * as $ from 'jquery';
import 'datatables';

export default (function () {
  $('.dataTable').DataTable({
    stateSave: true
  });
}());
