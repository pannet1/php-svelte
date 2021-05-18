  export const  ts2dt = (ts) => {        
    const date = new Date(ts);    
    return (date.getDate()+
          "/"+(date.getMonth()+1)+
          "/"+date.getFullYear());    
  }
 
 export const fd2json = (fd) => {
    let obj = {};
    for (let key of fd.keys()) {
      obj[key] = fd.get(key);
    }
    return JSON.stringify(obj);
  }

  export const agree = () => {
    const agree = document.getElementById('checkAgree').checked;      
    agree ?  register(): _setError('you need to agree prior registration')     
  }  


