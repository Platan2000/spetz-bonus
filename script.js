document.addEventListener("DOMContentLoaded", () => {
    
    const userParamForm = document.querySelector('#user-params');
    const userParamInput = userParamForm.querySelector('#user-param__value');
    const userList = document.querySelector('#usersList');
    const userInfoTmpl = document.querySelector('#user');

  
    userParamForm.addEventListener('submit', (event) => {
        event.preventDefault()
    })

    userParamInput.addEventListener('input', debounce( (event) => {
        let value = event.target.value
        const params = new URLSearchParams();
        params.append('value', value);
        
        axios.post('getUsers.php', params)
        .then(function (response) {
            // console.log(response.data); // выводим ответ сервера в консоль
            buildUsers (response.data)
        })
        .catch(function (error) {
            console.log(error); // выводим ошибку в консоль
        },1);
        
        
    }, 350))

  

    function buildUsers (param) {
        userList.innerHTML = '' 
        if(!param.length) return

        param.forEach((item, index) => {
            const {fullname, email, phone, budget} = item
            const cloneTempl = userInfoTmpl.content.cloneNode(true)
            const userInfo = Array.from(cloneTempl.querySelectorAll('[data-user]'));

            userInfo.forEach(i => {
                const data = i.dataset.user
                if(i.nodeName === 'INPUT') {
                    // i.value = item[data]
                    i.dataset.id = item['id']
                    return
                }
                let node = i.lastChild ?? i

                switch(data) {
                    case 'fullname':
                        node.textContent = item[data] ||  ''
                        break;
                    case 'email':
                        if(!email){
                            node.classList.add('disabled')
                        } else {
                            node.textContent = email
                        }
                        break;
                    case 'phone':
                        if(!phone){
                            node.classList.add('disabled')
                        } else {
                            node.textContent = phone
                        }
                        break;
                    case 'budget':
                        node.textContent = Math.round(budget) || 0
                        break;
                }
                

                // node.textContent = item[data] ||  '' // подставляем значения из базы
            })
            
            userList.appendChild(cloneTempl)
            
            const editUser = document.querySelectorAll("[data-original-title='Edit']")[index]
            editUser.addEventListener('click', async (event) => {
                event.target.classList.toggle('fa-pencil-alt')
                event.target.classList.toggle('fa-check-circle')

                const userId = event.target.closest('.candidate').querySelector('#edit-user-budget').dataset.id
                const userSetNewBudget = event.target.closest('.candidate').querySelector('#edit-user-budget')
                userSetNewBudget.disabled = false;
                // userSetNewBudget.dataset.id = item.id

                const params = new URLSearchParams();
                params.append('id', userId);
                params.append('budget', userSetNewBudget.value);

                if(!event.target.classList.contains('fa-check-circle')) {
                    await axios.post('saveUserBudget.php', params)
                    .then(res => {
                        const newBudget = res.data['CURRENT_BUDGET']
                        event.target.closest('.candidate').querySelector('[data-user="budget"]').textContent = Math.round(newBudget)
                        userSetNewBudget.disabled = false;
                        console.log(event.target)
                    })
                    .catch(rej => console.log(rej))
                    userSetNewBudget.disabled = true;
                }
                // axios.post('saveUserBudget.php', params)
            })


        });
       
      
    }

    function debounce(callee, timeoutMs) {
    
        return function perform(...args) {
          let previousCall = this.lastCall
          this.lastCall = Date.now()

          if (previousCall && this.lastCall - previousCall <= timeoutMs) {
            clearTimeout(this.lastCallTimer)
          }
          this.lastCallTimer = setTimeout(() => callee(...args), timeoutMs)
        }
      }

})