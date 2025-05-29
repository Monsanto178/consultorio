const showBtns = document.querySelectorAll('.showBtn');
const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
const pacienteId = document.getElementById('paciente_card').dataset.pacienteId;

const loadedOptions = 
{
    'alergias': false,
    'ant-patologicos': false,
    'ant-hereditarios': false
}
const antecedentes = {
    'ant-hereditarios' : [],
    'ant-patologicos' : [],
    'alergias' : []
}

function displayCard(type = '', content = '') {    
    const container = document.getElementById(type);
    let div = document.createElement('div')
    div.classList.add('card', 'card-body', 'd-flex', 'flex-row', 'justify-content-between')
    div.id = `${type}-${content.id}`;
    div.innerHTML = 
        `
        <div class="d-flex flex-row gap-1"> 
            <button 
                data-tipo="${type}"
                type="button" 
                class="btn btn-warning btn-editar">
                Editar
            </button>
            <button type="button" class="btn btn-danger">Eliminar</button>
        </div>
        `
    if (type === 'ant-hereditarios') {
        div.insertAdjacentHTML('afterbegin', `<p>${content.antecedente}</p>`)
        div.insertAdjacentHTML('afterbegin', `<p>${content.relacion}</p>`)
        div.querySelector('button').dataset.id = `${content.id}`
    } else if (type === 'ant-patologicos') {
        div.insertAdjacentHTML('afterbegin', `<p>${content.antecedente}</p>`)
        div.querySelector('button').dataset.id = `${content.id}`
    } else {
        div.insertAdjacentHTML('afterbegin', `<p>${content.alergia}</p>`)
        div.querySelector('button').dataset.id = `${content.id}`
    }
    container.appendChild(div);
}

showBtns.forEach(btn => {
    btn.addEventListener('click', async () => {
        let opcion = btn.dataset.tipo;
        if (loadedOptions[opcion]) {return};
        document.getElementById(opcion).innerHTML = 
        `
            <div class="spinner-border" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        `;
        try {
            const peticion = await fetch(`/pacientes/${pacienteId}/load-${opcion}`, 
                {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': token,
                },
                body: JSON.stringify({})
            });
            const data = await peticion.json();
            
            if (data.length === 0) {
                document.getElementById(opcion).innerHTML = 
                `
                    <p class='text-muted'>No hay ${opcion.replace('-', ' ')} registrados </p>
                `
            } else {     
                document.getElementById(opcion).innerHTML = '';           
                data.forEach(contenido => {
                    displayCard(opcion, contenido)
                    antecedentes[opcion].push(contenido)
                });
            }
            loadedOptions[opcion] = true;
        } catch (error) {
            console.error('ERROR', error);
        }
    })
});

// EDIT MODAL

import * as bootstrap from 'bootstrap';
const modal = bootstrap.Modal.getOrCreateInstance(document.getElementById('editModal'));
const currentData = {};

function getContent(tipo, id) {
    const arr = antecedentes[tipo];
    const result = arr.find(item => item.id.toString() === id.toString());
    return result
}

document.addEventListener('click', (e) => {
    if (e.target && e.target.matches('.btn-editar')) {        
        const tipo = e.target.dataset.tipo;
        const id = e.target.dataset.id;
        const contenido = getContent(tipo, id);

        currentData['currentRoute'] = `/pacientes/${pacienteId}/${tipo}/${id}`;
        currentData['option'] = tipo;

        const editInput = document.getElementById('editInput');
        const editTitle = document.getElementById('editTitle');
        const editLabel = document.getElementById('editLabel');
        const extraContent = document.getElementById('extra-content');
        editInput.setAttribute('data-id', id)

        extraContent.innerHTML = '';

        switch (tipo) {
            case 'alergias':
                editInput.name = 'alergia';
                editInput.value = contenido.alergia;
                editTitle.innerText = 'Alergia';
                editLabel.innerText = 'Editar Alergia';
                break;
            case 'ant-patologicos':
                editInput.name = 'antecedente';
                editInput.value = contenido.antecedente;
                editTitle.innerText = 'Antecedente';
                editLabel.innerText = 'Editar Antecedente Patológico';
                break;
            case 'ant-hereditarios':
                editInput.name = 'antecedente';
                editInput.value = contenido.antecedente;
                editTitle.innerText = 'Antecedente';
                editLabel.innerText = 'Editar Antecedente Hereditario';
                extraContent.innerHTML = `
                    <label for="extraEdit" class="form-label">Relación</label>
                    <select id="extraEdit" name="relacion" class="form-control">
                        <option value="">Elegir...</option>
                        <option value="Padre" ${contenido.relacion === 'Padre' ? 'selected' : ''}>Padre</option>
                        <option value="Madre" ${contenido.relacion === 'Madre' ? 'selected' : ''}>Madre</option>
                        <option value="Hermano/a" ${contenido.relacion === 'Hermano/a' ? 'selected' : ''}>Hermano/a</option>
                        <option value="Abuelo/a" ${contenido.relacion === 'Abuelo/a' ? 'selected' : ''}>Abuelo/a</option>
                        <option value="Familiar" ${contenido.relacion === 'Familiar' ? 'selected' : ''}>Familiar</option>
                    </select>
                `;
                break;
        }
        modal.show();
    }
    if (e.target && e.target.matches('.btn-close')) {
        document.body.focus();
        modal.hide()
    }
});
document.getElementById('editModal').addEventListener('hidden.bs.modal', () => {
    document.body.focus();
})


// ENVIAR DATOS EDITADOS
const sendBtn = document.getElementById('submit-btn');
const formulario = document.getElementById('ediForm');

const tooltipInstances = {};

function clearValidation(input) {
    input.classList.remove('is-invalid');
    input.removeAttribute('data-bs-toggle');
    input.removeAttribute('title');

    if (tooltipInstances[input.name]) {
        tooltipInstances[input.name].dispose();
        delete tooltipInstances[input.name];
    }
}

function applyTooltip(input, message) {
    input.classList.add('is-invalid');
    input.setAttribute('data-bs-toggle', 'tooltip');
    input.setAttribute('data-bs-placement', 'top');
    input.setAttribute('title', message);

    const tooltip = new bootstrap.Tooltip(input);
    tooltip.show();
    tooltipInstances[input.name] = tooltip;
}

function updateField(type="", id, content) {
    const contenido = document.getElementById(`${type}-${id}`)
    if (type === 'ant-hereditarios') {
        const pTag = contenido.querySelectorAll('p')
        let relacion = pTag[0];     
        let antecedente = pTag[1];
        relacion.textContent = content[0];
        antecedente.textContent = content[1];
    } else {
        contenido.querySelector('p').textContent = content
    }
}

formulario.querySelectorAll('input, select').forEach(input => {
    input.addEventListener('input', () => clearValidation(input));
})

sendBtn.addEventListener('click', async (e) => {
    formulario.querySelectorAll('input, select').forEach(input => clearValidation(input));

    e.preventDefault();
    const form = new FormData(formulario);
    const id = editInput.dataset.id;

    try {
        const response = await fetch(`${currentData.currentRoute}`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': token,
                'Accept': 'application/json'
            },
            body: form
        });

        const data = await response.json();
        if (!response.ok) {
            if (data.errors) {
                Object.entries(data.errors).forEach(([fieldName, messages]) => {
                    const input = formulario.querySelector(`[name="${fieldName}"]`);
                    if (input) {
                        applyTooltip(input, messages.join(', '));
                    }
                });
            };

            return;
        }
        const content = currentData.option === 'ant-hereditarios' ? [extraEdit.value, editInput.value] : editInput.value
        updateField(currentData.option, id, content);
        alert(data + ' Guardado exitosamente!');
    } catch (error) {
        console.error('ERROR EN LA PETICIÓN: ', error);
    }
});