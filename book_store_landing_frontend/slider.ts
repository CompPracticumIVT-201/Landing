import {getBooks} from "./getBooks";

interface Book {
  title: string;
  author: string;
  description: string;
  cover_image: string;
  genre: {
    name: string;
  };
}

const books: Book[] = await getBooks();

const content = books.map((book) => [
  book.title,
  book.author,
  book.description,
  book.genre.name,
  book.cover_image
]);

export {content};

let n = 0;

function nextSlide() {
  n += 1;
  if (n > 4) {
    n = 0;
  }
  changeContent(n);
}
export {nextSlide}
function previousSlide() {
  n -= 1;
  if (n < 0) {
    n = 4;
  }
  changeContent(n);
}
export {previousSlide}
function changeContent(n: number) {
  var elems = [],
  image = document.getElementById("slider-image") as HTMLImageElement;
  elems.push(document.getElementById("slider-title"));
  elems.push(document.getElementById("slider-author"));
  elems.push(document.getElementById("slider-desc"));
  elems.push(document.getElementById("slider-genre"));

  function unfade(element: HTMLElement) {
    var op = 0.1;  // initial opacity
    element.style.display = 'block';
    var timer = setInterval(function () {
        if (op >= 1){
            clearInterval(timer);
        }
        element.style.opacity = String(op);
        element.style.filter = 'alpha(opacity=' + op * 100 + ")";
        op += op * 0.1;
    }, 10);
    }

  for (var i = 0; i < elems.length; i++) {
    elems[i]!.textContent = content[n][i] as string;
    elems[i]!.style.opacity = "0";
  }
  image.src = content[n][elems.length];
  image.style.opacity = "0";

  for (var i = 0; i < elems.length; i++) {
    unfade(elems[i]!);
  }
  unfade(image);
}
