import './bootstrap';
import * as bootstrap from 'bootstrap';

import DataTable from 'datatables.net-bs5';

window.DataTable = DataTable;

// Script for consulta_control view
document.addEventListener('DOMContentLoaded', () => {
    const selector = document.getElementById('anomaly_opts');
    const anomalias = document.getElementById('anomalias');
    const anomaly_text = document.getElementById('inputAnomaly');    
  
    if (selector && anomalias) {
      const collapse = new bootstrap.Collapse(anomalias, { toggle: false });
  
      selector.addEventListener('change', () => {
        if (selector.value === 'Si') {            
          collapse.show();
          anomaly_text.disabled = false;
        } else {
          collapse.hide();
          anomaly_text.value = '';
          anomaly_text.disabled = true;
        }
      });
    }
  });
  