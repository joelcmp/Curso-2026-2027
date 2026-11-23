# Documento de decisiones de diseño

> Cada decisión: **qué** elegiste, **por qué**, y **qué alternativa descartaste**.
> Se evalúa la justificación, no la longitud. Máximo 2 páginas en la Fase 1.

## Ruta de trabajo

- [ ] Ruta A · Figma (enlace con permiso de lectura: …)
- [x] Ruta B · VS Code (diseño directamente en `guia.html`)

## 1. Color (RA1 · CE b)

- Tono de acento de la ficha y cómo has obtenido la escala (50 … 950):
  - Tono de 172°, establecido por la ficha del Caso 10. La escala se ha generado mediante OKLCH, manteniendo un croma de 0,12 y variando la luminosidad para obtener seis niveles (50, 300, 400, 700, 800 y 950). Los colores se han convertido a hexadecimal para incorporarlos a los tokens Sass.

- Por qué el acento de texto/fondo es el 700 en claro y el 400 en oscuro (o el que elijas):
  - Se utilizan los niveles 700 en tema claro y 400 en tema oscuro como color de acento principal. Ambos superan el mínimo WCAG de 4,5:1 sobre sus respectivas superficies.

- Tokens semánticos añadidos y para qué:
  - `error` y `error-tenue` para representar errores de validación y sus fondos asociados. Se ha creado una familia de cuatro colores mediante OKLCH.

- Pares de contraste añadidos a `$pares-contraste`:
  - `error` sobre `error-tenue` y `error` sobre `superficie`, ambos con un mínimo de 4,5:1.
  - `borde-control` sobre `fondo`, con un mínimo de 3:1 para garantizar la visibilidad de los bordes de los controles.

## 2. Tipografía (RA1 · CE b)

- Familia elegida y por qué (rendimiento, legibilidad, licencia):
  - Se ha elegido `system-ui` como fuente principal porque utiliza la tipografía nativa del sistema operativo, ofrece buena legibilidad y no necesita descargar archivos externos ni gestionar licencias de fuentes web.
- Base y razón en móvil y escritorio. Por qué esas:
  - En móvil se utiliza una base de 16 px con una razón modular de 1,2, mientras que en escritorio se utiliza una base de 18 px con una razón de 1,25. Se ha elegido una escala más moderada en pantallas pequeñas y algo mayor en escritorio para mantener una jerarquía visual equilibrada.
- Medida de línea (`max-inline-size` del párrafo en `ch`):
  - Se establece un máximo de 65ch para limitar la longitud de los párrafos y facilitar su lectura.

## 3. Espaciado y forma

- Escala de espaciado y radios. Si cambias algo respecto a la plantilla, por qué:
  - Se utiliza una escala de espaciado basada en múltiplos de 4 px: 4, 8, 12, 16, 24, 32, 48 y 64 px, convertidos a `rem`. Para los radios se utilizan 8 px en controles, 12 px en tarjetas y 999 px en elementos tipo píldora. Se mantiene esta escala porque permite conservar una separación y una apariencia coherentes entre los componentes.

## 4. Componentes (RA1 · CE f)

| Componente | Estados | Cómo se resuelve cada estado en CSS |
| --- | --- | --- |
| Botón | normal, hover, foco, desactivado, secundario | Se utilizan tokens de color, `:hover`, `:focus-visible` y `:disabled`. El botón secundario se diferencia mediante un modificador BEM. |
| Turno | disponible, seleccionado, ocupado, foco | Estado base, `:has(:checked)`, `:has(:disabled)` y `:has(:focus-visible)`. Los estados se diferencian mediante bordes, fondos y texto. |
| Contador de invitados | normal, seleccionado, desactivado, foco | Opciones segmentadas mediante Flexbox. Se utilizan `:has(:checked)`, `:has(:disabled)` y `:has(:focus-visible)`. |
| Aviso de pago | normal | Se presenta mediante un borde de acento, fondo tenue y tipografía monoespaciada para el concepto del pago. |


## 5. Comparativa de tecnologías (RA1 · CE e · RA2 · CE i)

| Criterio | Figma | Penpot | Diseño en código |
| --- | --- | --- | --- |
| Coste / licencia | Propietario, con plan gratuito limitado y planes de pago. | Código abierto; plan Professional gratuito en la nube y planes de pago. | Sin coste de licencia por las herramientas básicas. |
| Traslado a código (handoff) | Facilita la inspección y entrega de diseños a desarrollo. | Permite inspeccionar diseños y facilitar su implementación. | Directo: el diseño se construye en el propio HTML y CSS. |
| Mantenimiento del sistema | Variables y componentes reutilizables. | Componentes y bibliotecas reutilizables. | Tokens y componentes mantenidos directamente en el código. |

| Criterio | Sass + CSS propio | CSS nativo sin preprocesador | Bootstrap / Tailwind |
| --- | --- | --- | --- |
| Tokens y temas | Variables Sass, mapas y generación de Custom Properties. | Custom Properties y funciones nativas de CSS. | Variables y configuración del framework. |
| Peso del CSS final | CSS compilado; el peso depende de las reglas y componentes incluidos en el proyecto. | No necesita compilación adicional. | Depende del framework y de la eliminación de estilos no utilizados. |
| Control de la cascada | Permite organizar estilos con `@layer`, módulos y BEM. | Control directo mediante la cascada nativa. | Puede requerir adaptación para evitar conflictos con estilos predefinidos o utilidades. |

**Decisión y motivo:**
Se ha elegido la Ruta B, diseño directamente en VS Code, junto con Sass y CSS propio. Esta combinación permite trabajar con tokens centralizados, reutilizar componentes y controlar la cascada mediante `@layer`. Se descarta utilizar herramientas de diseño visual como Figma o Penpot y frameworks CSS, porque se ha optado por desarrollar y mantener el sistema de diseño directamente en código.
