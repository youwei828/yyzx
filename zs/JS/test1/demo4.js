//快状作用域，必须用let定义   let修饰相比var优点更好，块状修饰符
{
  let user = (window.user = {});
  let name = 'John';
  let email = 'John@example.com';
  let telephone = '123456789012345';
  user.getName = function (){
    return name;
  }
  user.getEmail = function (){
    return email;
  }
  user.getPhone = function (){
    return telephone;
  }
  
}