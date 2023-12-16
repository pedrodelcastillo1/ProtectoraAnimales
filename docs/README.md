# Cosas que faltan por hacer
- [x] Terminar introducir Adopcion. [Pedro]
- [x] Terminar del todo adopcion [Pedro]

- [x] Cuando pulses introducidir Animal redirigir a la vista de la tabla de animal [Andres]
- [x] Separar el formador tabla en una vista a parte. (va a ser una plantilla) [Andres]
- [x] Cambiar nombre de los ficheros de controladores [Andres]
- [ ] Crear una clase de la extienda todos los controladores que tengan los metodos generales
- [ ] Cambiar el nombre las funciones del controlador para que sean más legibles
- [ ] Cambiar los dos curl a algo normal [Andres]


- [ ] Unificar controlador, automatizado. [Christian]
- [ ] Crear y actualizar automatizados en el Crud [Christian]
 



## Si nos da la vida:

    - Cambiar a include todos los headers
	    Pasos: Generar un index con gestor de ruta, para que llame de forma dinamica a los controladores usuario, animal y adopcion 
	      (esto va a cambiar casi todo el codigo)


# Protectora de Animales

Implementación de la arquitectura/patrón Modelo-Vista-Controlador en el trabajo de la Protectora de Animales.

## Versión 3.1 (10/12/2023)

Añadida la funcionalidad de crear un nuevo animal. Al crearlo se pueden comprobar si se ha introducido correctamente y mostrar los demás animales en la propia vista de "Animal". 

Creada la carpeta "docs" para documentar el seguimiento de versiones y mejoras para la propia aplicación. 

# Como usar Git
Primero que nada hay que tener claroq ue existen dos repositorio uno que cada persona tiene en **local(en tu ordenador)** y otro en **remoto (en servidores de GitHub)**. Ambos son iguales la unica diferencia es que el repositorio remoto es capaz de recibir las peticiones que le hagamos (pull y push).

## Normas de repositorios (local y remoto)

1. La rama main no se toca hasta realizar el pull request (más abajo se explica que es la pull request)
2. Cada uno localmente trabaja en una rama distinta a la main

## Pasos a seguir
**Nota cuando se usa <> no hay que poner los piquitos en los comandos, esto solo te dice la posicion y el contendio que debes poner en esa posicion**
1. git clone https://github.com/pedrodelcastillo1/ProtectoraAnimales.git
2. git config --global user.email "\<correoUsadoEnGithub>"(Si ya has realizado este paso o no te lo pide no hace falta que lo hagas)
3. git config --global user.email "\<tuNombreDeusuario>"(Si ya has realizado este paso o no te lo pide no hace falta que lo hagas)

2. git brach \<nombreDeTuRamaNueva>
3. git checkout \<nombreDeturamaCreada> (rama en donde trabajaras)
4. git push origin \<nombreDeturamaCreada> (Esto subira tu nueva rama al repositorio remoto)

Los 2 siguientes pasos se pueden repetir cuantas veces quieras

5. realizar todos los commits que quieras
6. git push origin \<nombreDeturamaCreada> (Esto subira todas los commits al repositorio remoto) (Este paso lo puedes realizar todos las veces que quieras, simplemente estaras añadiendo commit a tu rama del repositorio remoto la cual solo tocas tu)

7. Avisa de has acabado tu parte
8. realizar un último push si hay algun commit que te falta por subir a tu rama 
9. Realiza una pull request (ya explicare como hacerla)


### Comandos de git 
**Nota cuando se usa <> no hay que poner los piquitos en los comandos, esto solo te dice la posicion y el contendio que debes poner en esa posicion**


1. #### clonar el repositorio remoto
    Para clonar un repositorio remoto se utiliza:<br>
    **git clone \<RutaDelRepositorio>**<br>
    Ej: git clone https://github.com/pedrodelcastillo1/ProtectoraAnimales.git
    
2. #### Crear un rama
    Para crear una rama en el repositrio local usar:<br>
    **git branch \<nombreRama>**<br>
    Ej: git branch anacardo<br><br>
    En este cado se crea una rama llamada anacardo

3. #### Cambiarte de rama
    **git checkout \<nombre de la rama a la que quiero cambiar>**<br>
    Ej: git checkout anacardo<br><br>
    Imaginemonos que estaamos en la rama main pues al hacer git checkout anacardos nos hemos cambiado en nuestro repositorio local de la rama main a la rama anacardo

4. #### ¿Como realizar un commit?
    Para realizar un commit hay seguir tres pasos (siempre son los mismos):<br>
    1. **git add .**<br>
        Este comando agrega todo lo que hemos cambiado y guardado(importante guardar simepre), en el area index (este area es como una zona donde vas presentando todos las cosas que luego vas a commitear).<br>

        Si por ejemplo haces git add . y luego realizas un cambio en algun codigo y lo guardas puedes cvolver hacer un nuevo git add para añadir todo lo que hayas modificado al area de index. (Puedes realizar todos los que quieras)
        
    2. **git commit -m "\<Aqui se pone el mesanje que tiene cada commit>"**<br>
        Este comando realiza el commit, de todos los archivos que hay qen el index. Cuando se realiza esto todos los archivos que habia en el area de index se borrar.

5. #### Revisar las areas
    **git status**<br>
    con git status podremos ver que archivos estan en el area de trabajo y que archivos estan en el area de index.<br>
    Ej:
    <image src="ejemplogitStatus.png" alt="Esta es una iamgen sobre git status">
    Aqui se puede observar como te indica:<br>
    1. Changes to be commited -> Lo que nos quiere decir es que todos los archivos que estan en verde estane el area index o stage (ambos nombres son los mismo)
    2. Changes not staged for commit -> Loq ue nos quiere decir es que todos los archivos que estan en rojo pueden pasar al area stage, por lo tanto estan en el area de trabajo o working (ambos nombres son lo mismo).
   

5. #### Realizar fetch
    **git fetch \<nombre repositorio remoto almacenado en el remositorio local>**<br>
    Ej:git fetch origin<br> 
    Con esto nos traemos todos los cambios del repositorio remoto a la zona de commits de nuestro repositorio local
    Recordad que hay 3 areas en un repositorio local:<br>

    - Area de trabajo o workspace (corresponde a cuando nosotros guardamos un fichero con Ctrl + S o guardamos un fichero del documento Word. Vamos el guardado normal de toda la vida de dios)

    - Index o stage (Cuando realizamos un add se guarda aquí)

    - Area de commit o Repositorio local (Cuando realizamos commit se guarda aqui)
6. #### Realizar push
    git push \<nombre repositorio remoto almacenado en el remositorio local> \<nombre de rama destino en repositorio remoto><br>
    Ej: git push origin main<br>
    Aqui lo que realizamos es lo siguiente los commits de la rama en la que estemos del repositorio local a un repositorio origin (origin corresponde con la url del repositorio remoto), y en ese repositorio remoto lo que empuajamos lo vamos a mergear en la rama main ubicada en el repositorio remoto
6. #### Realizar merge
    **git merge <nombre rama la cual mergeas>**

    Ej: Se quiere mergear la rama desarrolloAndres con el main y que prevalezca la rama main, para ello nos vamos  a la rama main y desde ahi ejecutamos el comando:<br>
    git merge desarrolloAndres<br>
    Asi mergearemos la rama desarrolloAndres con main<br>
    **Cuidado si estais en desarrolloAndres y haceis git merge main, la rama main se fusiona con desarrolloAndres y prevalece esta ultima, lo que significa que la rama main acabara en desarrolloAndres**
    
8. #### Realizar pull
    **git pull \<nombre repositorio remoto almacenado en el remositorio local> \<nombre de rama destino en repositorio remoto>**
    git pull origin main
    Aqui lo que realizamos es lo siguiente nos traemos todos los commits que se ubican en la rama main del repositorio remoto origin . 
    
    Y a dónde lo lleva? A la rama que en la estemos acatualmente en el repositorio local

    Por lo tanto si estamos en la rama main nos traera los commit que estan en la rama main del repositorio remoto.

    Pero si estamos en la rama huevos de nuestro repositorio local, nos traera los commits de la rama main del repsositorio remoto a nuestra rama huevos

    Por debajo git pull usa dos comandos que ya hemos visto.

    1. Git fetch (te trae a la zona de commit del repositorio local todos los commit que no tengas del repositorio remoto)
    2. git merge
    
    (Internamente realiza estas dos cosas)

