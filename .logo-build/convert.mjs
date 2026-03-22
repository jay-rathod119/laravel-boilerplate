import fs from 'fs';
import path from 'path';
import { fileURLToPath } from 'url';

const __dirname = path.dirname(fileURLToPath(import.meta.url));
const pdfPath = path.join(process.env.USERPROFILE, 'Desktop', 'Logo_Final (2).pdf');
const outDir = path.join(__dirname, '..', 'public', 'brand');

if (!fs.existsSync(pdfPath)) {
  console.error('PDF not found:', pdfPath);
  process.exit(1);
}

fs.mkdirSync(outDir, { recursive: true });

const pdf2img = await import('pdf-img-convert');
const pdfBuffer = fs.readFileSync(pdfPath);

const large = await pdf2img.convert(pdfBuffer, { width: 512, page_numbers: [1] });
if (!large?.length) {
  console.error('No pages rendered');
  process.exit(1);
}

fs.writeFileSync(path.join(outDir, 'logo.png'), large[0]);
fs.writeFileSync(path.join(outDir, 'favicon.png'), large[0]);

const small = await pdf2img.convert(pdfBuffer, { width: 32, page_numbers: [1] });
fs.writeFileSync(path.join(outDir, 'favicon-32.png'), small[0]);

console.log('Wrote public/brand/logo.png, favicon.png, favicon-32.png');
