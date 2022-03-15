# LRC Batch Mint System

This system utilizes a few parts.

1. Python to generate images and metadata according to the standards for the new Layer 2 marketplace.
2. NodeJS to pre-calculate CIDs on images and metadata files.
3. Python to run the batch minting process.

**System Requirements**

* [Docker](https://docs.docker.com/engine/install/) or [Python](https://www.python.org/downloads/)

## Setting up the generator

1. Copy the `traits.example.py` file and rename it to `traits.py`.
2. Edit the file according to the comments and examples to match your collection traits and items.
3. Copy the `.env.example` file and rename it to `.env`.
4. Add your information to the file. `MINTER` should be set to the wallet address that mints the collection. Some times this is not the same as the artist.

## Docker Setup on Linux, Mac, and Windows with Ubuntu

Open a bash terminal, and `cd` to this folder. Now run `./docker.sh build` to setup a python environment with the scripts ready to go:

```shell
$ ./docker.sh build
Sending build context to Docker daemon  4.455MB
Step 1/8 : FROM python:3.8-slim-buster
 ---> 5cc8cb0c433a
Step 2/8 : RUN pip install --upgrade pip
 ---> Using cache
 ---> c41a43e68ccf
Step 3/8 : RUN apt-get -y update;     apt-get -y upgrade
 ---> Running in b0de1ea0fcb2
Get:1 http://security.debian.org/debian-security buster/updates InRelease [65.4 kB]
Get:2 http://deb.debian.org/debian buster InRelease [122 kB]
Get:3 http://security.debian.org/debian-security buster/updates/main amd64 Packages [316 kB]
...
Removing intermediate container 5a635f977c14
 ---> 29f50c57b0c1
Step 12/12 : CMD ["bash"]
 ---> Running in d0b767026eb4
Removing intermediate container d0b767026eb4
 ---> 5e6e99aaa565
Successfully built 5e6e99aaa565
Successfully tagged lrc-batch:latest
```

## Docker setup on Docker Desktop for Windows

1. In this folder, `Right-click -> Open in Windows Terminal` to open command prompt. Now run `docker.bat` to build the image for our container.
2. Once the build is successful, open Docker Desktop and locate the image
3. Click the blue RUN button
4. **Name** the image whatever you like
5. Leave **Ports** alone
6. Set **Host Path** to this folder
7. Set **Container Path** to `/loopymint2`
8. Click RUN
9. Once running, find the container in the list and click CLI to open the shell prompt.

### Generating Images

Once at this shell prompt, you can run the image generator and specify how many unique items you want to create.

```shell
$ generate 100
```

### Generating Metadata

After you generate the images and upload to IPFS, you can then generate the metadata JSON files.

```shell
$ metadata --cid QmVpLSoYak1N8pasuxLrNZLbnvrNvLTJmY8ncMBjNRPBtQ
```
