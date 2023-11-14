function pow(x, n) {
    if (x == 0) {
        return 1;
    } else {
        let result = 1;
        while (n > 0) {
            result *= x;
            n--;
        }
        return result; 
    }
}

function calculatePow(x, n) {
    let p = document.getElementById('calculatePow');
    p.innerHTML = "Ответ = " + pow(x, n);
}

function gcd(a, b) {
    if(a==b){
        return a;
    }
    if (a != 0 && b != 0) {
        if (a > b) {
            return gcd(a % b, b);
        } else {
            return gcd(a, b % a);
        }
    } else {
        return a + b;
    }
}

function calculateGcd(a, b) {
    let p = document.getElementById('calculateGcd');
    p.innerHTML = "Ответ = " + gcd(a, b);
}

function minDigit(x) {
    let s = x.toString();
    let m = 9;
    for (let i = 0; i < s.length; i++) {
      let d = parseInt(s[i]);
      if (d < m) {
        m = d;
      }
    }
  
    return m;
}

function calculateMinDigitd(x) {
    let p = document.getElementById('calculateMinDigitd');
    p.innerHTML = "Ответ = " + minDigit(x);
}
 
function pluralizeRecords(n) {
    if (n % 10 === 1 && n % 100 !== 11) {
      return `В результате выполнения запроса была найдена ${n} запись`;
    }
    if ((n % 10 >= 2 && n % 10 <= 4) && (n % 100 < 10 || n % 100 >= 20)) {
      return `В результате выполнения запроса было найдено ${n} записи`;
    }
    return `В результате выполнения запроса было найдено ${n} записей`;
}

function calculatePluralizeRecords(n) {
    let p = document.getElementById('calculatePluralizeRecords');
    p.innerHTML = "Ответ = " + pluralizeRecords(n);
}
  
function fibb(n) {
    if (n <= 1) {
      return n;
    }
  
    let a = 0;
    let res = 1;
  
    for (let i = 2; i <= n; i++) {
      let next = a + res;
      a = res;
      res = next;
    }
    return res;
}
  
function calculateFibb(n) {
    let p = document.getElementById('calculateFibb');
    p.innerHTML = "Ответ = " + fibb(n);
}